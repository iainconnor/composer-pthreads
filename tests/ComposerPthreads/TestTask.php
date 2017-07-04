<?php


namespace IainConnor\ComposerPthreads;

class TestTask extends \Thread
{
    /** @var string */
    protected $message;

    /** @var ResponseDataBundle */
    protected $responseDataBundle;

    /** @var bool */
    protected $done = false;

    /**
     * TestTask constructor.
     * @param string $message
     * @param ResponseDataBundle $responseDataBundle
     */
    public function __construct(string $message, ResponseDataBundle $responseDataBundle)
    {
        $this->message = $message;
        $this->responseDataBundle = $responseDataBundle;
        $this->done = false;
    }

    public function run()
    {
        $greeting = new TestAutoloadableClass($this->message);
        $this->responseDataBundle->setData($greeting->getGreeting());
        $this->done = true;
    }

    /**
     * @return bool
     */
    public function isDone()
    {
        return $this->done;
    }
}