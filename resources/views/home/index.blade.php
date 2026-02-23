<!DOCTYPE html>
<html lang="en">

  @include('home.css')

<body>

   @include('home.header')

  @include('home.main_banner')
  @include('home.category')
  @include('home.book' ,['books' => $books])
  @include('home.footer')