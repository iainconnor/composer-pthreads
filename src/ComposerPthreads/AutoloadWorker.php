<?php

namespace IainConnor\ComposerPthreads;

/**
 * Class AutoloadWorker
 *
 * A Worker that autoloads Classes from the given Composer autoloader file.
 *
 * @package IainConnor\ComposerPthreads
 */
class AutoloadWorker extends \Worker
{
    /** @var string Full path to the composer autoloader file. */
    protected $autoLoaderFile;

    /**
     * ComposerWorker constructor.
     *
     * @param string $autoLoaderFile
     */
    public function __construct($autoLoaderFile)
    {
        $this->autoLoaderFile = $autoLoaderFile;
    }

    public function run()
    {
        /** @noinspection PhpIncludeInspection */
        require_once($this->autoLoaderFile);
    }

    public function start(
        /** @noinspection PhpSignatureMismatchDuringInheritanceInspection */
        int $options = null
    )
    {
        return parent::start(PTHREADS_INHERIT_NONE);
    }
}
