<?php 
interface NewsIterator { public function hasNext(): bool; public function next(); } class NewsList implements
    NewsIterator { private $news=[]; private $position=0; public function addNews($news) { $this->news[] = $news;
    }

    public function hasNext(): bool {
    return $this->position < count($this->news);
        }

        public function next() {
        $newsItem = $this->news[$this->position];
        $this->position++;
        return $newsItem;
        }
        }

        // Sử dụng
        $newsList = new NewsList();
        $newsList->addNews("Tin tức 1");
        $newsList->addNews("Tin tức 2");
        $newsList->addNews("Tin tức 3");

        $iterator = $newsList;

        while ($iterator->hasNext()) {
        $newsItem = $iterator->next();
        echo $newsItem . "<br>";
        }
        ?>