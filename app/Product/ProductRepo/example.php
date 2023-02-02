<?php
interface ManageableInterface
{
    public function managable();
}
interface workableInterface
{
    public function work();
}

interface sleepableInterface
{
    public function sleep();
}

class HumanWorker implements workableInterface,sleepableInterface,ManageableInterface
{
    public function work()
    {

    }

    public function sleep(){

    }
    public function managable()
    {
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements workableInterface,ManageableInterface
{
    public function work(){

    }
    public function managable()
    {
        $this->work();
    }
}

class Captain
{
    public function fire(ManageableInterface $worker){
        $worker->managable();
    }
}
