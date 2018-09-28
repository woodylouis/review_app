<div class="stats">
  <a href="{{ route('user.followings', $user->id) }}">
    <strong id="following" class="stat">
      {{ count($user->followings) }}
    </strong>
    Followings
  </a>
  <a href="{{ route('user.followers', $user->id) }}">
    <strong id="followers" class="stat">
      {{ count($user->followers) }}
    </strong>
    Followers
  </a>
  <a href="{{ route('user.show', $user->id) }}">
    <strong id="statuses" class="stat">
      {{ $user->reviews()->count() }}
    </strong>
    Reviews
  </a>
</div>