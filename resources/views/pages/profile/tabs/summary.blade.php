<h3>Hello {{$user->name}} !</h3>
<hr>
<p>Name: {{$user->name}}</p>
<p>Username: {{$user->username}}</p>
<p>Email: {{$user->email}}</p>
<p>City: {{$user->city}}</p>
<p>Joined: {{$user->created_at}}</p>
<p>Messages: {{$user->posts()->count()}}</p>