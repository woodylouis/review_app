<!--If the users visit their own page, this form is not shown-->

@if ($user->id !== Auth::user()->id)
  <div id="follow_form">
    @if (Auth::user()->isFollowing($user->id))
      <form action="{{ route('followers.destroy', $user->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm bg text-light">Unfollow</button>
      </form>
    @else
      <form action="{{ route('followers.store', $user->id) }}" method="post">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-sm bg text-light">Follow</button>
      </form>
    @endif
  </div>
@endif