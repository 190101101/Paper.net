<?php 

namespace library;

class pagination
{
    public $start;
    public $page;
    public $count;
    public $limit;
    public $length;

    public function caller()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET')
        {
            http_response_code(404); REDIRECT();
        } 

        if(isset($_GET['page'])) 
        {
            $explode = explode('/', $_GET['page']);
           
            $count = count(explode('/', $_GET['page'])) - 1;

            $replace = str_replace('/', '=', implode('/', $explode));

            if(preg_match('/page=0/', $replace))
            {
                REDIRECT('404');
            }

            $page = $explode[$count];
        }
        else
        {
            $page = 1;
        }

        if(ctype_digit($page) === false) 
        {
            $page = 1;
        }
        return $page;
    }

    public function page($count, $limit)
    {
        $this->count  = $count;
        $this->limit  = $limit;
        $this->page   = $this->caller();
        $this->start  = ($this->page * $this->limit) - $this->limit;
        $this->length = ceil($count / $this->limit);
        return $this;
    }

    public static function selector($p, $prefix = false)
    {
        $page = ceil($p->count / $p->limit);

        if($p->page > 1)
        {
            echo '<a href="/'.$prefix.'page/'.($p->page - 1).'" >&#171</a>';
        }

        if(($p->page - 20) > 1)
        {
            echo '<a href="/'.$prefix.'page/'.($p->page - 20).'" >'.($p->page - 20).'</a>';
            echo '<a>...</a>';
        }

        if($page > 1)
        {
            for($i = ($p->page - 5); $i < ($page + 1); $i++)
            {
                if($i > 0 and $i <= ($p->page + 5))
                {
                    if($p->page == $i)
                    {
                        $swch = 'active';
                    }
                    else
                    {
                        $swch = false;   
                    }
                    echo '<a href="/'.$prefix.'page/'.$i.'" class="'.$swch.'"">'.$i.'</a>';
                }
            }

            if(($p->page + 20) < $p->length)
            {
                echo '<a>...</a>';
                echo '<a href="/'.$prefix.'page/'.($p->page + 20).'" >'.($p->page + 20).'</a>';
            }

            if(($p->page + 1) <= $p->length)
            {
                echo '<a href="/'.$prefix.'page/'.($p->page + 1).'" >&#187</a>';
            }
        }

        if($p->count >= 1 && $p->page > $p->length)
        {
            REDIRECT("{$prefix}page/1");
        }

        if($p->count < 1 && $p->page > 1 && $p->length == 0 || $p->page == 0)
        {
            REDIRECT("{$prefix}page/1");
        }
    }
}