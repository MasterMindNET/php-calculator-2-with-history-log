<?php
namespace classes;

class Calculator
{
    public $sum;
    public $currentNumber;
    public $modifier;
    public $history;
    public $errorMessage;

    public function __construct()
    {
        $this->sum = 0;
        $this->currentNumber = 0;
        $this->modifier = 2;
        $this->history .= $_POST['history'] ? $_POST['history'] : '';
    }

    function calculate()
    {
        if (isset($this->sum) && is_numeric($this->sum)){
            $actionClear = $_POST['action'] !== 'clear';
            $this->sum = $_POST['result'] ? +$_POST['result'] : 0;
            if($actionClear)
                $this->history .= $this->sum;
            switch ($_POST['action']) {
                case '+':
                    $this->add();
                    break;
                case '-':
                    $this->minus();
                    break;
                case '*':
                    $this->multiply();
                    break;
                case '/':
                    $this->divide();
                    break;
                case 'clear':
                    $this->sum = 0;
                    break;
                default:
                    $this->errorMessage = 'There is no such operators';
            }
            if($actionClear){
                $this->history .= " {$_POST['action']} {$this->modifier} = $this->sum \n";
            }
            else {
                $this->history.= "\nCleared\n";
            }

        }
    }


    function add()
    {
        $this->sum += $this->modifier;
    }

    function minus()
    {
        $this->sum -= $this->modifier;
    }

    function multiply()
    {
        if ($this->sum !== 0)
            $this->sum *= $this->modifier;
        else
            $this->errorMessage = "You can not " . __FUNCTION__ . " this number!";
    }

    function divide()
    {
        if ($this->sum !== 0)
            $this->sum /= $this->modifier;
        else
            $this->errorMessage = "You can not " . __FUNCTION__ . " this number!";
    }
}