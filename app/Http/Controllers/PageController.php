<?php

namespace App\Http\Controllers;

use App\About;
use App\Benefit;
use App\ClientLink;
use App\ContactRequest;
use App\Feedback;
use App\HomeAccordion;
use App\Information;
use App\Introduce;
use App\Mail\ContactRequest as ContactMail;
use App\News;
use App\NewsSEO;
use App\Package;
use App\PageInformation;
use App\Regent;
use App\Service;
use App\SliderImage;
use App\SMTP;
use App\Video;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use SEO;

class PageController extends Controller
{

    public function index()
    {
        $slider = SliderImage::where('publish', 1)->get();
        $feedbacks = Feedback::all();
        $video = Video::where('page', 'home')->first();
        $benefits = Benefit::where('feature', 1)->get();
        $accordions = HomeAccordion::all();
        $this->seo('home');

        if (!isset($video->video)) {
            $video = "<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/8XT2g-ETGAE?feature=oembed&showinfo=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe>";
        } else {
            $video = $video->video;
        }

        return view('pages.index', compact('slider', 'feedbacks', 'video', 'benefits', 'accordions'));
    }

    public function seo($code)
    {
        $page = PageInformation::where('page', $code)->first();
        $page->seo();
    }

    public function news($id)
    {
        $this->seo('news');
        $news = News::where('publish', 1)->where('category_id', $id)->orderBy('created_at', 'DESC')->paginate(4);
        return view('pages.news', compact('news'));
    }

    public function aboutUs()
    {
        $this->seo('about');
        $regents = Regent::all();
        $about = About::first();
        $video = Video::where('page', 'about')->first();
        if (!isset($video->video)) {
            $video = "<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/8XT2g-ETGAE?feature=oembed&showinfo=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe>";
        } else {
            $video = $video->video;
        }
        return view('pages.AboutUs', compact('regents', 'about', 'video'));
    }

    public function contact()
    {
        $this->seo('contact');
        $info = Information::first();
        return view('pages.contact', compact('info'));
    }

    public function contactPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email:max:255',
            'message' => 'required'
        ]);

        $data = $request->all();

        ContactRequest::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'phone' => $data['phone']
        ]);
        $time = date('Y-m-d G:i:s', time());
        $info = Information::first();
        $mailDeli = $info->email;
        $smtp = SMTP::first();
        $check = $smtp->checkConnection();
        if ($check == 'OK') {
            config([
                'mail.host' => $smtp->host,
                'mail.port' => $smtp->port,
                'mail.encryption' => $smtp->encryption,
                'mail.username' => $smtp->username,
                'mail.password' => $smtp->password
            ]);
            Mail::to($mailDeli)->send(new ContactMail($data, $time));

            if (App::getLocale() == 'en') {
                Session::flash('message', 'Your contact successfully sent!');
            } else {
                Session::flash('message', 'Thông tin liên hệ đã được gửi!');
            }
        } else {
            Session::flash('error', 'Có lỗi xảy ra, thông tin không thể gửi. Vui lòng liên hệ với Việt Nhân qua Hotline hoặc chat trực tuyến.');
        }

        return redirect()->back();
    }

    public function projects()
    {
        $this->seo('project');
        $video = Video::where('page', 'product')->first();
        $intro = Introduce::first();
        $services = Service::all();
        if (!isset($video->video)) {
            $video = "<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/8XT2g-ETGAE?feature=oembed&showinfo=0\" frameborder=\"0\" allowfullscreen=\"\"></iframe>";
        } else {
            $video = $video->video;
        }
        return view('pages.ProjectInfo', compact('video', 'intro', 'services'));
    }

    public function features()
    {
        $this->seo('benefit');
        $benefits = Benefit::where('feature', 0)->get();
        return view('pages.features', compact('benefits'));
    }

    public function pricing()
    {
        $this->seo('pricing');
        $benefits = Benefit::where('feature', 0)->get();
        $packages = Package::orderBy('from', 'ASC')->take(4)->get();
        return view('pages.pricing', compact('benefits', 'packages'));
    }

    public function newsDetail(Request $request)
    {
        $id = $request->id;
        $news = News::findOrFail($id);
        $seo = NewsSEO::where('news_id', $id)->first();
        SEO::setTitle($seo->title);
        SEO::setDescription($seo->description);
        SEOMeta::addKeyword(explode(",", $seo->keyword));
        return view('pages.NewsDetail', compact('news'));
    }

    public function setLocale(Request $request)
    {
        $locale = $request->local;
        Session::put('locale', $locale);
        return redirect()->back();
    }

    public function partner()
    {
        $this->seo('partner');
        $partners = ClientLink::all();
        return view('pages.partner', compact('partners'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'key' => 'required|max:255'
        ]);
        $key = $request->key;
        $term = '%' . $key . '%';
        $results = News::whereHas('category', function ($query) use ($term) {
            $query->where('name', 'LIKE', $term);
        })->orWhereHas('user', function ($query) use ($term) {
            $query->where('name', 'LIKE', $term)->orWhere('email', 'LIKE', $term);
        })->orWhere('title', 'LIKE', $term)
            ->orWhere('description', 'LIKE', $term)
            ->orWhere('content', 'LIKE', $term)
            ->orWhere('content_en', 'LIKE', $term)
            ->orWhere('title_en', 'LIKE', $term)
            ->orWhere('description_en', 'LIKE', $term)
            ->orWhere('slug', 'LIKE', $term)
            ->paginate(10);
        return view('pages.search', compact('results', 'key'));
    }

    public function benefitDetail($id)
    {
        $benefit = Benefit::findOrFail($id);
        return view('pages.FeatureDetail', compact('benefit'));
    }
}
