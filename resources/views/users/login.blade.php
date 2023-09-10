<x-layout>
    <x-flash-message />
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="/authenticate" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control form-control-lg" name="email"
                                placeholder="Masukkan email yang valid" />
                            <label class="form-label" for="email">Email address</label>
                            @error('email')
                            <div class="invalid-feedback d-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" class="form-control form-control-lg" name="password"
                                placeholder="Masukkan Password" />
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback d-block">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Belum punya akun? <a href="/register"
                                    class="link-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <x-footer />
    </section>
</x-layout>