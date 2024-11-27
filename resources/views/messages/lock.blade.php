@extends('welcome')
@section('content')
    <div class="wrapper bg-lock-screen">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <form action="{{ route('message.unlock', ['name' => request()->route('name')]) }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <i class="fadeIn animated bx bx-user" style="font-size: 120px"></i>
                                        </div>
                                        <p class="text-center">{{ $message->recipient->name }}</p>
                                        <div class="col-12">
                                            <label for="password" class="form-label">{{ $message->question }}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="text" name="password" class="form-control border-end-0"
                                                    id="password" placeholder="Your Answer"> <a href="javascript:;"
                                                    class="input-group-text bg-transparent"></a>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bx bxs-lock-open"></i>Jawab</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
