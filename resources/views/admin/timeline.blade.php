@extends('admin.layouts.app')

@section('style')
<!-- Include any specific styles if necessary -->
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Timeline</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Timeline</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Timeline example -->
      <div class="row">
        <div class="col-md-12">
          <!-- The timeline -->
          <div class="timeline">
            <!-- Timeline time label -->
            <div class="time-label">
              <span class="bg-red">10 Feb. 2014</span>
            </div>
            <!-- Timeline item -->
            <div>
              <i class="fas fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-sm">Read more</a>
                  <a class="btn btn-danger btn-sm">Delete</a>
                </div>
              </div>
            </div>

            <!-- Another timeline item -->
            <div>
              <i class="fas fa-user bg-green"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
              </div>
            </div>

            <!-- Another timeline item -->
            <div>
              <i class="fas fa-comments bg-yellow"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-warning btn-sm">View comment</a>
                </div>
              </div>
            </div>

            <!-- Timeline time label -->
            <div class="time-label">
              <span class="bg-green">3 Jan. 2014</span>
            </div>

            <!-- Timeline item with images -->
            <div>
              <i class="fa fa-camera bg-purple"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                <div class="timeline-body">
                  <img src="{{ asset('assets/images/bag_a.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_b.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_c.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_d.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_e.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_f.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_g.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_h.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_i.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                  <img src="{{ asset('assets/images/bag_j.jpg') }}" alt="Bag" style="width: 180px; height: 180px; border-radius: 5%">
                </div>
              </div>
            </div>

            <!-- Timeline item with video -->
            <div>
              <i class="fas fa-video bg-maroon"></i>
              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/OcslEyiraPc" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="timeline-footer">
                  <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                </div>
              </div>
            </div>

            <!-- Timeline end -->
            <div>
              <i class="fas fa-clock bg-gray"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<!-- Include any specific scripts if necessary -->
@endsection