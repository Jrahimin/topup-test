@extends('layouts.master')

@section('content')
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        6a. What do you think about the current condition of software development in bangladesh and how this differ from the other developed countries?<br/>Also put a comment how we can improve ourselves as a giant digital developed nation in this field?
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Software Development in Bangladesh currently is in a growing phase. The industry has evolved over the years and getting shape. But still, it has some vulnerabilities and lacks stability. As some of the clients are not yet ready to define their products properly and the lack of professionalism hampers software development at times. And the demand for quantity over quality persists here which also reflects in the software development process as a counter defence mechanism. And Work-life balance is hazardous most of the cases.
                    <br/><br/>
                    In the developed countries, clients are more professional and they define their products with proper documentation. Also, quality is given priority there. It helps the software development process. Work-life balance is ensured and the developers usually get the right priority.
                    <br/><br/>
                    To improve ourselves, we should focus more on quality, prioritize the software developers. Need to ensure that developers having their daily relaxation time to think and cultivate on their creativity. Training facilities should be adequate for all level of developers. We should be visionary, act at present and leap forward to the future.
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        6b. Two fathers & two sons went for fishing. They caught 3 fish. How its possible to equally distribute these 3 fish among all of them without piecing and without killing any of them?
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    If one of the fathers is Grand father, then the other father is also a son. So there is a son, a father who is a son too. And another father who is the Grand Father. Thus a total of three people are there. So, those three fishes can be distributed equaly among them.
                </div>
            </div>
        </div>
    </div>
@endsection
