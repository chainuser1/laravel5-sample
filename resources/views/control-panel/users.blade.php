
 <h3 class="h3 text-light text-center amersicome center-block ">Registered Users</h3>
 @if($users!=null)
    <table class="table table-striped bg-success">
        <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Name: </th>
              <th class="text-center">Email Address</th>
              <th class="text-center">Home Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=> $user)
            <tr>
                <td>{!!$key+1!!}.) <img class="img-badge-2" src="{!!route('profile.prof_pic',$user->email)!!}" alt="image"/></td>
                <td>{!!$user->lname!!},{!!$user->fname!!} {!!$user->mname!!} </td>
                <td>{!!$user->email!!}</td>
                <td>{!!$user->address!!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-light">No users registered other than you</p>
@endif