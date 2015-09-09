
 <h3 class="h3 text-light text-center">Registered Users</h3>
 @if($users!=null)
    <table class="table table-striped bg-success">
        <thead>
            <tr>
              <th>#: </th>
              <th>Name: </th>
              <th>Email Add: </th>
              <th>Address: </th>
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