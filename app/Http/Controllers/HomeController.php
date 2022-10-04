<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSection;
use App\Models\Contact;
use App\Models\ContactSection;
use App\Models\Coundown;
use App\Models\Education;
use App\Models\PaymentMethod;
use App\Models\PersonalArea;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use App\Models\PortfolioSection;
use App\Models\PortHeader;
use App\Models\PortHeaderNav;
use App\Models\Pricing;
use App\Models\PricingSection;
use App\Models\Ready;
use App\Models\Service;
use App\Models\ServiceSection;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Study;
use App\Models\Testimonial;
use App\Models\Vision;
use App\Models\WhyMe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'headers'           => PortHeader::all(),
            'navs'              => PortHeaderNav::all(),
            'personals'         => PersonalArea::all(),
            'socials'           => Social::all(),
            'abouts'            => About::all(),
            'skills'            => Skill::all(),
            'whyme'             => WhyMe::all(),
            'visions'           => Vision::all(),
            'services'          => ServiceSection::all(),
            'SerItem'           => Service::all(),
            'categories'        => PortfolioCategory::all(),
            'projects'          => PortfolioProject::orderBy('name', 'ASC')->paginate(9),
            'portfolios'        => PortfolioSection::all(),
            'coundowns'         => Coundown::all(),
            'educations'        => Education::all(),
            'studies'           => Study::orderBy('id', 'DESC')->get(),
            'pricings'          => PricingSection::all(),
            'prices'            => Pricing::all(),
            'testimonials'      => Testimonial::all(),
            'blogsections'      => BlogSection::all(),
            'blogs'             => Blog::orderBy('id', 'DESC')->get(),
            'readysection'      => Ready::all(),
            'contactsection'    => ContactSection::all(),
            'contacts'          => Contact::all(),
            'payments'          => PaymentMethod::orderBy('id', 'DESC')->get(),
        ]);
    }
}
