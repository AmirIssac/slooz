@extends('layouts.app')

@section('content')
<style>
    .con{
        margin: 50px 50px 0 50px;
        display: flex;
        flex-direction: column;
        justify-content:space-around;
    }

img{
    width: 75px;
    height: 100px;
}
img:hover{
    cursor: pointer;
}
</style>
<div class="con">
    @foreach($reports as $report)
    <?php $orders = $report->orders;
            $sum =0;
    ?>
    <!--<table style="width:100%; margin-top:75px;"> -->
        <table class="table table-bordered m-3">
            <thead class="thead-dark">
                <tr>
                    <th><h5 class="float-right">التقرير رقم {{($report->id)}}</h5>   {{$report->created_at}}</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <th>رقم الطلب</th>
                    <th>المبلغ</th>
                    <th>تاريخ التسليم</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->tax}}</td>
                    <td>{{$order->updated_at}}</td>
                    </tr>
                    <?php $sum+=$order->tax; ?>
                    @endforeach
                    <tr>
                        <td style="font-weight: bold">مجموع المبالغ</td>
                        <td>{{$sum}}</td>
                        <td><form action="{{route('print.pdf',$report->id)}}" method="POST">
                            {!! csrf_field() !!}
                            <button class="btn btn-danger"> pdf طباعة </button>
                        </td>
                    </tr>
            </tbody>
      </table>
    @endforeach
</div>
@endsection