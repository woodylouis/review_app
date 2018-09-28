@if (count($reviews) > 0)
    <ol class="statuses list-unstyled text-left">
      @foreach ($reviews as $review)
        @include('reviews.show_review', ['user' => $review->user])
      @endforeach
    </ol>
    {!! $reviews->render() !!}
@endif