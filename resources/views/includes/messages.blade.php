@if(count($errors))
    <div class="form-group row">
        <div class="col-md-9 offset-md-3">
            <div class="error-container">
                <p>
                    <i class="fas fa-exclamation-circle error-icon"></i>
                    <span class="error-span">Oops!: </span>
                    <span class="error-message">{{$errors->all()[0]}}</span>
                </p>
            </div>
        </div>
    </div>
@endif
