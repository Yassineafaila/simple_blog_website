 <section class="hero  h-96 flex flex-col justify-center align-center text-center space-y-4 mb-4 relative overflow-hidden">
    <img src="{{asset("/images/hero_background.jpg")}}" alt="heroBackground" class="absolute w-full h-96 inset-0 "/>
    <div class="overlay inset-0 absolute opacity-20"></div>
     <div class="content z-10">
         <h1 class="text-2xl font-bold uppercase text-white">
             Welcome to PureInsight - Where Clarity Meets Wisdom
         </h1>
         <p class="text-base text-gray-200 font-bold my-4  sm:text-base">
             Discover the art of clear thinking and insightful living at
             PureInsight. Our mission is to illuminate your path with wisdom,
             providing a haven for those who seek clarity in a world filled with
             noise.
         </p>
         <div>
             @if (auth()->user()->name ?? false)
                 <div></div>
             @else
                 <a href="/users/register"
                     class="inline-block border-2 border-white bg-buttonBg font-bold text-white border-none py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Sign
                     Up</a>
             @endif
         </div>
     </div>
 </section>
