<html>
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<body>
    Start date: <input id="start" type="text" name="start"/>
    End date: <input id="end" type="text" name="end"/>
    <a href = "{{ route('payments.show') }}" onclick = "this.href=this.href+ '/' + document.getElementById('start').value + '/' + document.getElementById('end').value;" class="button">Filter</a>
    <table class="styled-table">
    <thead>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Surname </th>
            <th> Last payment amount </th>
            <th> Last payment date </th>
        </tr>
    </thead>
    <tbody>
         @foreach($payments as $user)
          <tr>
              <td> {{$user->id}} </td>
              <td> {{$user->name}} </td>
              <td> {{$user->surname}} </td>
              <td> {{$user->amount}} </td>
              <td> {{$user->created_at}} </td>
          </tr>
         @endforeach
   </tbody>
   </table>
</body>
</html>
