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
</li>