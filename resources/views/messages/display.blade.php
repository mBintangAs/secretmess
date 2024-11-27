@extends('welcome')
@section('content')
    <div class="wrapper bg-lock-screen">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">

                                    <p class="text-center"> Untuk {{ $message->recipient->name }}, dari
                                        {{ $message->sender->name }}</p>
                                    <div class="col-12">
                                        <div class="border p-2 rounded h-100">{{ $message->content }}</div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
                                            <a  href="/{{ $message->recipient->name }}/next" class="btn btn-primary"><i
                                                    class="bx bxs-arrow-from-left"></i>Berikutnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
