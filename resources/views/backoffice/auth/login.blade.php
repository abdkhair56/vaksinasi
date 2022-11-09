@extends('layouts.auth')
@section('main-content')
  <section id="auth-login" class="row flexbox-container">
    <div class="col-xl-3 col-6">
      <div class="card bg-authentication mb-0">
        <div class="row m-0">
          <div class="col-md-12 col-12 px-0">
            <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
              <div class="card-content">
                <form action="{{ route('login.execute') }}" method="post" id='mainForm'>
                  {{ csrf_field() }}
                  <div class="form-group mb-50">
                    <label class="text-bold-600" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="Email" autocomplete='off'>
                  </div>
                  <div class="form-group">
                    <label class="text-bold-600" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name='password' placeholder="password">
                  </div>
                  <div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                    <div class="text-left">&nbsp;</div>
                    <div class="text-right">
                      <a href="#" target='_blank' class="card-link">
                        <small>
                          Lupa Password ?
                        </small>
                      </a>
                    </div>
                  </div>
                  <button type="button" id='loginTrigger' class="btn btn-primary glow w-100 position-relative btn-login">
                    Login <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('javascript')
  <script type='text/javascript'>
    $ ("#loginTrigger").on ('click', function () {
      let email = $ ("#email")
      let password = $ ("#password")

      if (email.val ().trim () === "") {
        alertError ({
          html: 'Harap masukan alamat Email !',
          onClose: () => {
            email.focus ()
          }
        })
      } else if (password.val ().trim () === "") {
        alertError ({
          html: 'Harap masukan kata sandi terlebih dahulu !',
          onClose: () => {
            password.focus ()
          }
        })
      } else {
        $ ("#mainForm").submit ();
      }
    })
  </script>
@endpush
