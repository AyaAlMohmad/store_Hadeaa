@extends('frontend.profile')

@section('item')
    <div class="col-md-10">

        <div class="row">

            <div>



                <form class="user_edit" method="POST" action="{{ route('user.update',$user->id) }}">
                    @csrf
                    <div >
                        <label for="email" >الأميل</label>

                        <div >
                            <input id="email" type="email"  @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" >
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div >
                        <label for="name" >الاسم</label>

                        <div >
                            <input id="name" type="text"  @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name}}" >
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div >
                        <label for="gender" >الجنس</label>

                        <div >
                            <input id="gender" type="text"  @error('gender') is-invalid @enderror"
                                name="gender" value="{{ $user->gender }}" >
                        </div>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div >
                        <label for="phone" >الهاتف</label>

                        <div >
                            <input id="phone" type="text"  @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $user->phone }}">
                        </div>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div >
                        <label for="password" >كلمةالسر الجديدة</label>

                        <div >
                            <input id="password" type="password"
                                 @error('password') is-invalid @enderror" name="password" 
                                autocomplete="new-password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                


                    <div class="header-dropdown-bottom">
                        <button class="btn-more" type="submit">تعديل</button>
                    </div>


                </form>




            </div>
        </div>

        <!-- end row -->
    </div>
@endsection
