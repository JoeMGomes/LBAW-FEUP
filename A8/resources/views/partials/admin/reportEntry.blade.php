<tr>
    <td class="align-middle text-center">{{$report->id}}</td>
    <td class="align-middle text-center">{{$report->name}}</td>
    <td class="align-middle text-center">{{date('M d, Y, H:m', strtotime($report->date))}}</td>
    <td class="align-middle text-center">{{$report->type}}</td>
    <td class="align-middle text-center "><a class="text-black" href="#">{{$report->text_body}}</a></td>
    <td class="align-middle text-center">{{$report->offense ? $report->offense: 'NULL'  }}
    <td class="align-middle text-center ">
    <form method="POST" action="{{route('handleReport')}}">
        @csrf
            <input hidden value="{{$report->id}}" name="repID">
            <button name="delete" class="btn text-danger">Delete</button>
            <button name="keep" class="btn text-success">Keep</i></button>
        </form>
    </td>
</tr>