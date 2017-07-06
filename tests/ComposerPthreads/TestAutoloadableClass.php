<?php

namespace IainConnor\ComposerPthreads;

class TestAutoloadableClass
{
    /** @var string */
    protected $message;

    /**
     * Autoloadable constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getGreeting()
    {

        return "Hello " . $this->message;
    }
}
