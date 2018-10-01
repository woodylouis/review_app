<li id="review-{{ $review->id }}">
  <a href="{{ route('user.show', $user->id )}}">
    <img src="https://api.adorable.io/avatars/285/abott@adorable.png" class="user-image" alt="profile-img" width="50" height="50">
  </a>
  <span class="user">
    <a href="{{ route('user.show', $user->id )}}">{{ $user->name }}</a>
  </span>
  <span class="timestamp">
    {{ $review->created_at->diffForHumans() }}
  </span>
  <span class="content">{{ $review->title }}</span>
  <span class="content">{{ $review->review_detail }}</span>
  
  @can('destroy', $review)
      <form action="{{ route('review.destroy', $review->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm btn-danger status-delete-btn">Delete</button>
      </form>
  @endcan
</li>