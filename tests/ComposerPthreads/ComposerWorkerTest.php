<?php

namespace IainConnor\ComposerPthreads;

use PHPUnit\Framework\TestCase;

class ComposerWorkerTest extends TestCase
{
    public function testAutoloadingWithPool()
    {
        // Create a new Pool to execute Workers in.
        // Note the custom Worker class and the argument pointing to the location of our Composer autoload file.
        $pool = new \Pool(4, AutoloadWorker::class, [dirname(__FILE__) . "/../../vendor/autoload.php"]);

        // This may seem a bit confusing, but read through the PThreads documentation and specifically [this issue](https://github.com/krakjoe/pthreads/issues/670) to help understand.
        // Basically, we need to create a set of thread-safe (Threaded) objects to store our output.
        // These need to be created here, in the main thread/scope.
        $poolOutput = [];

        for ($i = 0; $i < 10; $i++) {
            $poolOutput[$i] = new ResponseDataBundle();
            // We then pass those output holder objects into the Task and into the Pool.
            $pool->submit(new TestTask("$i", $poolOutput[$i]));
        }

        // Wait for any remaining Taks to finish executing.
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        while ($pool->collect(function (TestTask $task) {

            return $task->isDone();
        })) continue;

        $pool->shutdown();

        // Convert bundles to strings.
        $poolOutput = array_map(function (ResponseDataBundle $element) {
            return $element->getData();
        }, $poolOutput);

        // Sort alphabetically because async things might not execute in same order always.
        sort($poolOutput);

        $this->assertEquals("Hello 0\nHello 1\nHello 2\nHello 3\nHello 4\nHello 5\nHello 6\nHello 7\nHello 8\nHello 9", join("\n", $poolOutput));
    }
}
