<?php
class Stack
{
    private $stack;
    private $size;
    private $top = -1;

    public function __construct($size)
    {
        $this->size = $size;
        $this->stack = array();
    }

    public function push($int)
    {
        if($this->isFull())
        {
            echo "Stos jest pełny! Nie można dodać więcej elementów\n";
        }
        else
        {
            $this->top++;
            $this->stack[$this->top] = $int;
            echo "Dodano $int do stosu\n";
        }
    }

    public function pop()
    {
        if($this->isEmpty())
        {
            echo "Stos jest pusty! Nie można usunąć elementu\n";
        }
        else
        {
            $element = $this->stack[$this->top];
            unset($this->stack[$this->top]);
            $this->top--;
            return $element;
        }    
    }

    public function isEmpty()
    {
        return ($this->top === -1);
    }

    public function isFull()
    {
        return ($this->top === $this->size - 1);
    }

    public function getSize()
    {
        return $this->size;
    }

    public function printStack()
    {
        if($this->isEmpty())
        {
            echo "Stos jest pusty! Nie można wypisać zawartości\n";
        }
        else
        {
            foreach($this->stack as $element)
            {
                echo "$element ";
            }
            echo "\n";
        }
    }
}

$stack = new Stack(4);

while(true) 
{
    echo "Wybierz akcję:\n";
    echo "1 - push\n";
    echo "2 - pop\n";
    echo "3 - print\n";

    $choice = readline("Wybór: ");

    switch ($choice) 
    {
        case "1":
            $element = readline("Podaj element do dodania: ");
            $stack->push($element);
            break;
        case "2":
            $poppedElement = $stack->pop();
             echo "Usunięto element: $poppedElement\n";
            break;
        case "3":
            $stack->printStack();
            break;
        default:
            echo "Nieprawidłowy wybór. Wybierz liczbę z zakresu od 1 do 3\n";
    }
}
?>