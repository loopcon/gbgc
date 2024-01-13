@extends('layouts.header')
@section('content')
    <div class="faq-heading-section">
        <div class="container">
            <div class="bird-svg-main">
                <svg viewBox="0 0 96 36"><path fill-rule="evenodd" d="M56.825 4.463c-6.7-3.2-16.5-4-22.3 1.4-1.3 1.2-2.5 2.8-3.3 4.5-4.8-10.7-20.8-12.7-30.7-7.9-.8.4-.7 1.7.4 1.6 5.3-.6 10.4-2.2 15.9-1.3 3.2.5 6.3 1.7 8.7 4 2.2 2.1 4.1 5.3 4.4 8.1.2 1.4 2.3 1.6 2.5.1.4-2.5 1.7-5 3.5-6.8 5.6-5.7 13.6-2.9 20.2-1.2 1.5.4 2-1.9.7-2.5zm25.1 25.2c-2.1.8-4.2 1.7-6.2 2.9-3.4-5.3-11-7.4-16.7-5.1-1.4.5-.8 2.7.7 2.5 4.1-.5 7.9-1.1 11.4 1.5 1.1.8 2.5 2.4 3 3.3.4.7 1.2 1.1 1.9.6 1.7-1.2 3.6-2.1 5.5-2.9 1.8-.7 3.8-1.4 5.7-1.7 2.7-.4 5.2.2 7.8 0 .7 0 1.1-1 .5-1.5-3.6-2.5-9.8-.9-13.6.4z"></path></svg>
            </div>
            <div class="faq-heading-worktextsection">
                <h1>Faq</h1>
                <p>Prepare to fall in love. gbgc makes online training easy and delightful for everyone. And it takes just minutes to get started.</p>
                <button>Contact Us</button>
            </div>
            <img class="badal-imgset-1"  src="img/badal-img-2.svg" alt="">
            <img class="badal-imgset-2"  src="img/badal-img.svg" alt="">
        </div>
    </div> 


    <!-- faq section start  -->
    <div class="faq-section-main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div id="accordion" class="faq-accordion">
                        @if(count($faq)>0)
                            @foreach($faq as $data) 
                                <div class="faq-accordion-box">
                                    <a href="#" class="faq-accordion-header faq-active-accordion" data-target="acrd_1">{{$data->question}}</a>
                                    <div class="faq-accordion-content" id="acrd_1" style="display:block">
                                        <p>{{$data->answer}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                       <?php /* <div class="faq-accordion-box">
                            <a href="#" class="faq-accordion-header" data-target="acrd_2">Menu 2</a>
                            <div class="faq-accordion-content" id="acrd_2">
                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart....</p>
                            </div>
                        </div>
                        <div class="faq-accordion-box">
                            <a href="#" class="faq-accordion-header" data-target="acrd_3">Menu 3</a>
                            <div class="faq-accordion-content" id="acrd_3">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,...</p>
                            </div>
                        </div> */ ?>
                    </div>
                </div>
            </div>
            
                
        </div>
    </div>
    <!-- faq section end  -->
@endsection