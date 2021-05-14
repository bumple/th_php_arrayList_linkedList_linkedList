<?php

class LinkList
{
    private $firstnode;
    private $lastnode;
    private int $count;

    public function __construct()
    {
        $this->firstnode = null;
        $this->lastnode = null;
        $this->count = 0;
    }

    public function insertFirst($data): void
    {
        $node = new Node($data);
        $node->next = $this->firstnode;
        $this->firstnode = $node;

        if (is_null($this->lastnode)) {
            $this->lastnode = $node;
        }
        $this->count++;
    }

    public function insertLast($data): void
    {
        if (!is_null($this->firstnode)) {
            $node = new Node($data);
            $node->next = null;
            $this->lastnode->next = $node;
            $this->lastnode = $node;
            $this->count++;
        }else{
            $this->insertFirst($data);
        }
    }

    public function totalNodes(): int
    {
        return $this->count;
    }

    public function readList(): array
    {
        $listData = [];
        $current = $this->firstnode;

        while (!is_null($current)) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }

}