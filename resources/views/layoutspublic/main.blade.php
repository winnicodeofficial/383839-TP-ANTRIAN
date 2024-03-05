<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') | {{ config('app.name') }}</title>

  {{-- Styling --}}
  @include('includes.style')
  @stack('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        {{-- Navbar --}}
        @include('layoutspublic.partials.nav')


        {{-- Sidebar --}}
        @include('layoutspublic.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>{{ $page_heading }}</h1>
            </div>
          </section>

          @yield('content')
        </div>

        {{-- Footer --}}
        @include('layoutspublic.partials.footer')
      </nav>
    </div>
  </div>

  {{-- Scripts --}}
  @include('includes.script')
  @stack('layoutspublic.script')
</body>

</html>