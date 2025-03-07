@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="card p-3 rounded-4">
            <div class="row g-3 mb-3">
                <h1 class="small-title mb-4">Messages</h1>
                {{-- messages list --}}
                <div class="col-12 col-lg-4">
                    <div class="custom-card blue">
                        <div class="scroll-index rounded-2">

                            <label class="title mb-2">Messages</label>
                            <ul class="list-group scroller">
                                @foreach ($messages as $key => $message)
                                    <li class="list-group-item py-2">
                                        <a href="{{ route('messages.index', ['key' => $key]) }}"
                                            class="text-black text-decoration-none">
                                            <div class="d-flex justify-content-between text-decoration-none">
                                                <div class="d-flex flex-column justify-content-center ">
                                                    <div>{{ $message->name }}</div>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-8">
                                                            <pre class="fs-small text-wrap text-secondary m-0">{{ $message->email }}</pre>
                                                        </div>
                                                        <div class="col-12 col-lg-4">
                                                            <pre class="fs-xsmall text-wrap text-secondary m-0">{{ $message->created_at }}</pre>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <form action="{{ route('messages.destroy', $message->id) }}" method="post"
                                                        class="d-flex form-deleter">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger m-auto"> Delete </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- message picked --}}
                <div class="col-12 col-lg-8 ">
                    <div class="custom-card blue">
                        <ul class="list-group">
                            @foreach ($messages as $key => $message)
                                <li class="list-group-item rounded-2 p-3 @if ($key != $messageSelected) d-none @endif">
                                    <div class="row text-decoration-none">
                                        <div class="col-10">
                                            <div>{{ $message->name }}</div>
                                            <pre class="fs-small text-wrap text-secondary m-0">{{ $message->email }}</pre>
                                            <pre class="fs-xsmall text-wrap text-secondary m-0 mb-3">{{ $message->created_at }}</pre>
                                        </div>
                                        <div class="col-2 d-flex">
                                            <div class="availability-dot rounded-circle bg-primary m-auto"></div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            {{ $message->content }}
                                        </div>
                                        <div>
                                            <a href="mailto:{{ $message->email }}" class="btn doc-btn text-white text-decoration-none">Reply via Mail</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary doc-btn me-auto">
                <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
            </button>
        </div>
    </div>
@endsection
