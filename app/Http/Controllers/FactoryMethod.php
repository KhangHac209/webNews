<?php

// Factory Interface
interface NewsFactory
{
    public function createNews($data);
}

// Local News Factory
class LocalNewsFactory implements NewsFactory
{
    public function createNews($data)
    {
        return new LocalNews($data);
    }
}

// International News Factory
class InternationalNewsFactory implements NewsFactory
{
    public function createNews($data)
    {
        return new InternationalNews($data);
    }
}

// Sports News Factory
class SportsNewsFactory implements NewsFactory
{
    public function createNews($data)
    {
        return new SportsNews($data);
    }
}

// Base News Class
class News
{
    protected $title;
    protected $content;

    public function __construct($data)
    {
        $this->title = $data['title'];
        $this->content = $data['content'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }
}

// Local News Class
class LocalNews extends News
{
    protected $city;
    protected $region;
    protected $source;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->city = $data['city'];
        $this->region = $data['region'];
        $this->source = $data['source'];
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function display()
    {
        return "Tiêu đề: {$this->getTitle()} <br>
                Nội dung: {$this->getContent()} <br>
                Thành phố: {$this->city} <br>
                Khu vực: {$this->region} <br>
                Nguồn tin: {$this->source}";
    }
}

// International News Class
class InternationalNews extends News
{
    protected $country;
    protected $language;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->country = $data['country'];
        $this->language = $data['language'];
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function display()
    {
        return "Tiêu đề: {$this->getTitle()} <br>
                Nội dung: {$this->getContent()} <br>
                Quốc gia: {$this->country} <br>
                Ngôn ngữ: {$this->language}";
    }
}

// Sports News Class
class SportsNews extends News
{
    protected $sportType;
    protected $eventDate;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->sportType = $data['sportType'];
        $this->eventDate = $data['eventDate'];
    }

    public function getSportType()
    {
        return $this->sportType;
    }

    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function display()
    {
        return "Tiêu đề: {$this->getTitle()} <br>
                Nội dung: {$this->getContent()} <br>
                Thể loại: {$this->sportType} <br>
                Ngày diễn ra: {$this->eventDate}";
    }
}

// Usage Example
$dataLocal = [
    'title' => 'Điểm mặt những sự kiện nổi bật tại TP.HCM',
    'content' => 'Nội dung tin tức...',
    'city' => 'TP.HCM',
    'region' => 'Miền Nam',
    'source' => 'Báo Thanh Niên'
];

$dataInternational = [
    'title' => 'World News',
    'content' => 'International news content...',
    'country' => 'USA',
    'language' => 'English'
];

$dataSports = [
    'title' => 'Champions League Final',
    'content' => 'Sports news content...',
    'sportType' => 'Football',
    'eventDate' => '2024-05-29'
];

$localNewsFactory = new LocalNewsFactory();
$localNews = $localNewsFactory->createNews($dataLocal);
echo $localNews->display() . "<br><br>";

$internationalNewsFactory = new InternationalNewsFactory();
$internationalNews = $internationalNewsFactory->createNews($dataInternational);
echo $internationalNews->display() . "<br><br>";

$sportsNewsFactory = new SportsNewsFactory();
$sportsNews = $sportsNewsFactory->createNews($dataSports);
echo $sportsNews->display();

?>