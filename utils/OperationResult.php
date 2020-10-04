<?php


class OperationResult
{

    private $messages;
    private $previous_link;
    private $success;
    

    public function __construct($previous_link)
    {
        $this->success = true;
        $this->messages = Array();
        $this->previous_link = $previous_link;
        if ($this->getPrevious_link() == null)
            $this->setPrevious_link("/php-cms/index.php");
        
    }

    public function renderResult()
    {
        if ($this->success)
            include_once("../views/success.php");
        else
            include_once("../views/error.php");
    }

    /**
     * Get the value of messages
     */
    public function getMessages()
    {
        return $this->messages;
    }

    
    public function addMessage($message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Get the value of previous_link
     */
    public function getPrevious_link()
    {
        return $this->previous_link;
    }

    /**
     * Set the value of previous_link
     *
     * @return  self
     */
    public function setPrevious_link($previous_link)
    {
        $this->previous_link = $previous_link;

        return $this;
    }

    /**
     * Get the value of success
     */ 
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set the value of success
     *
     * @return  self
     */ 
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }
}
