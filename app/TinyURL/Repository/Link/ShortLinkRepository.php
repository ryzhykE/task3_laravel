<?php
namespace TinyURL\Repository\Link;
use TinyURL\Service\IdEncoder;

class ShortLinkRepository implements LinkRepositoryInterface
{
    protected $_repo;
    protected $_encoder;

    public function __construct(DbLinkRepository $repo,IdEncoder $encoder )
    {

        $this->_repo = $repo;
        $this->_encoder = $encoder;
    }
    
    public function create($url)
    {
        return $this->_encoder->encode($this->_repo->create($url));
    }

    public function find($id)
    {
        return $this->_repo->find($this->_encoder->decode($id));

    }
}

