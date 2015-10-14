
 <h3 class="h3 text-light text-center amersicome center-block ">Registered Users</h3>
 @if($users!=null)
    <table class="table table-striped bg-success">
        <thead>
            <tr>
              <th>#</th>
              <th ">Name: </th>
              <th >Email Address</th>
              <th >Home Address</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=> $user)
            <tr>
                <td>{!!$key+1!!}.) <img class="img-badge-2" src="{!!route('profile.prof_pic',$user->email)!!}" alt="image"/></td>
                <td>{!!$user->lname!!},{!!$user->fname!!} {!!$user->mname!!} </td>
                <td>{!!$user->email!!}</td>
                <td>{!!$user->address!!}</td>
                <td class="dropdown bg-warning">
                    <a class="text-success" href="#action" role="label" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">Action<span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                        <li><a class="action-admin">Make Admin</a></li>
                        <li><a class="action-admin">Ban</a></li>
                        <li><a class="action-admin">Restore Account</a></li>
                        <li><a class="action-admin">Contact User</a></li>
                        <li><a class="action-admin">Generate Report Card</a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-light">No users registered other than you</p>
@endif