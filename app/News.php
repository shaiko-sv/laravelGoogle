<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'The Four Possible Timelines for Life Returning to Normal',
            'shortText' => 'The coronavirus outbreak may last for a year or two, but some elements
                            of pre-pandemic life will likely be won back in the meantime',
            'text' => 'The new coronavirus has brought American life to a near standstill, closing businesses,
                        canceling large gatherings, and keeping people at home. All of those people must surely
                        be wondering: When will things return to normal?<br><br>
                        The answer is simple, if not exactly satisfying: when enough of the population — possibly
                        60 or 80 percent of people — is resistant to COVID-19 to stifle the disease’s spread from
                        person to person. That is the end goal, although no one knows exactly how long it will take
                        to get there.',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Why you should switch to Signal or Telegram from WhatsApp, Today',
            'shortText' => 'When we think of communicating with someone today, we mostly think of sending them a
                            text message or a voice note on WhatsApp. And some other people who are least bothered
                            about their privacy online...',
            'text' => 'When we think of communicating with someone today, we mostly think of sending them a text
                       message or a voice note on WhatsApp. And some other people who are least bothered about
                       their privacy online, think of Facebook Messenger. But not all these users know what’s
                       happening with the messages they exchange on these platforms. Let’s take a look at that.<br><br>
                       Before we start, let me admit, I am by no means an expert on security and privacy online.
                       But I have done enough research for the last couple of years, which made me switch to Firefox
                       and DuckDuckGo (with a lot of customized preferences on both), from Google’s Chrome browser
                       and search. I’ve made a lot of other such switches in my digital life. So not all that I
                       write here is bullshit.',
            'category_id' => 2,
        ],
        3 => [
            'id' => 3,
            'title' => 'The U.S. Coronavirus Trajectory Looks Worse Than Other Countries',
            'shortText' => 'Today I spent the morning with the leading scientists, diagnostic experts, Department
                            of Homeland Security specialists, and risk assessors. This afternoon on the Senate bill.',
            'text' => 'Today I spent the morning with the leading scientists, diagnostic experts, Department of
                       Homeland Security specialists, and risk assessors. This afternoon on the Senate bill. And
                       just now with the Minnesota Timberwolves organization dealing with a scary situation.<br><br>
                       Bad news first. Half the world’s cases are now in the US, Spain, and Italy. Soon half the
                       cases will be in the US. And then more. Right now, our trajectory looks worse than other
                       countries. And our survival rate projections are concerning. More could die from lack of
                       access to a bed, or a nurse, or a ventilator, than necessary. The shelter in place
                       restrictions make absolute sense. They are working in New York. I know they are hard. And
                       feel hopeless. But they aren’t.',
            'category_id' => 1,
        ],
        4 => [
            'id' => 4,
            'title' => 'VueJS vs ReactJS: Which Will Reign in 2020?',
            'shortText' => 'Whenever we start a web development project, the first thing that comes to mind is
                            the selection of suitable programming languages for a particular project.',
            'text' => 'Whenever we start a web development project, the first thing that comes to mind is the
                       selection of suitable programming languages for a particular project. Just like the
                       programming language, its frameworks and libraries play an equally important role in
                       helping developers to work smoothly on the project.<br><br>
                       Here in this blog, we are going to discuss the best frameworks of Javascript that are
                       Reacttjs & Vue because Javascript frameworks are ruling over the world of front-end
                       development of each and every software project.<br><br>
                       Well, React.js and Vue.js both are the best frameworks of Javascript. But, a study is
                       mandatory to know which will reign in 2020. In order to know this quickly, let’s follow
                       some of the stats which may help us to find out which is better.<br><br>
                       According to Stackoverflow survey, React.js is the most loved framework, followed by Vue.js.',
            'category_id' => 2,
        ],
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        return static::$news[$id];
    }

    public static function getNewsByCategory($categoryName)
    {
        $newsByCategory = [];
        $category = Category::getCategoryByName($categoryName);
        $categoryId = $category['id'];
        foreach (static::$news as $item) {
            if ($item['category_id'] == $categoryId) {
                array_push($newsByCategory, $item);
            }
        }
        return $newsByCategory;
    }
}
