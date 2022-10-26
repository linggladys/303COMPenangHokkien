@extends('layouts.app')
@foreach ($phrases as $phrase)
  @section('title','Drag and Drop from the category '.$phrase->phraseCategory->phrase_category_name)
@endforeach

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Phrase Matching Game</h1>
            <p class="lead">Drag the English phrases over to the matching male pronunciation audio in Hokkien

                     <a href="{{ route('draganddropaudiofemale.index',$phraseId)}}" class="btn btn-primary">Click here to switch the pronunciation audio to female</a>


            </p>

            <div id="msgIndicator"></div>
                <div class="col-6">
                          <ul class="draggable-list">
                            @foreach ($phrases as $phrase)
                                <li id="english{{ $loop->iteration }}" draggable="true" class="englishPhrases">
                                {{ $phrase->phrase_meaning }}
                                </li>
                            @endforeach
                    </ul>
                </div>
                <div class="col-6">
                         <ul class="draggable-list">
                            @foreach ($phrases as $phrase)
                            <li id="hokkien{{ $loop->iteration }}" draggable="true">
                                <audio preload="none" id="myAudio" controls controlsList="nodownload">
                                    <source src="{{ asset($phrase->phrase_pronunciation_audio_m) }}" type="audio/mpeg"/>
                                    Your browser does not support the audio element.
                                </audio>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div id="endMessage">
                    <h3 class="text-success">
                        <i class="fa-solid fa-smile"></i>
                        Sui! You made it!
                    </h3>
                    <button onclick="playAgain()" class="btn btn-secondary">Let's Play Again!</button>
                </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        const draggableListItems = document.querySelectorAll(".draggable-list li");
        const endMessage = document.getElementById("endMessage");
        const msgIndicator = document.getElementById("msgIndicator");
        let ul = document.querySelector('.draggable-list');


        // current phrase being dragged
        let selectedId;

        // target phrase
        let dropTargetId;

        // counter for correct phrases
        let matchingCounter = 0;

        addEventListeners();

        endMessage.style.display = "none";
        // msgIndicator.style.display = "none";

        // to shuffle the array
        for(let j=ul.children.length;j>0;j--){
            ul.appendChild(ul.children[Math.random() * j | 0]);
        }

        // as soon as we drag, we want to know what ID is
        function dragStart() {
            selectedId = this.id;
            console.log(selectedId);
            // console.log(document.querySelectorAll(".englishPhrases").length);
        }

        function dragEnter() {
            this.classList.add("over");
        }

        // we leave dropzone
        function dragLeave() {
            this.classList.remove("over");
        }

        function dragOver(event) {
            event.preventDefault();
        }

       function dragDrop() {
            // the drop target id
            dropTargetId = this.id;
            // console.log(increment);
            if (checkForMatch(selectedId, dropTargetId)) {
                document.getElementById(selectedId).style.display = "none";
                document.getElementById(dropTargetId).style.display = "none";
                msgIndicator.style.display = "block";
                msgIndicator.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa-solid fa-circle-check"></i>Correct  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';

                matchingCounter++;
            } else if (checkForMatch2(selectedId, dropTargetId)) {
                document.getElementById(selectedId).style.display = "none";
                document.getElementById(dropTargetId).style.display = "none";
                msgIndicator.style.display = "block";
                msgIndicator.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa-solid fa-circle-check"></i>Correct  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                matchingCounter++;
            }else{
                msgIndicator.style.display = "block";
                msgIndicator.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa-solid fa-xmark"></i>Wrong  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            }

            if (matchingCounter === document.querySelectorAll(".englishPhrases").length) {
                endMessage.style.display = "block";
                msgIndicator.style.display = "none";
            }

            this.classList.remove("over");
        }

        function checkForMatch(selected, dropTarget) {
            for(let i = 1;i<105;i++){
                  switch (selected) {
                    case "english".concat(i):
                        return dropTarget === "hokkien".concat(i)? true : false;
            }
        }
    }

        function checkForMatch2(selected, dropTarget) {
            for(let i=1;i<105;i++){
                  switch (selected) {
                    case "hokkien".concat(i):
                        return dropTarget === "english".concat(i) ? true : false;
                }
            }

        }

        function playAgain() {
            window.location.reload();
            // matchingCounter = 0;
            // endMessage.style.display = "none";
            // draggableListItems.forEach((item) => {
            //     document.getElementById(item.id).style.display = "block";
            // });
        }

        function addEventListeners() {
            draggableListItems.forEach((item) => {
                item.addEventListener("dragstart", dragStart);
                item.addEventListener("dragenter", dragEnter);
                item.addEventListener("drop", dragDrop);
                item.addEventListener("dragover", dragOver);
                item.addEventListener("dragleave", dragLeave);
            });
        }
    </script>
@endpush
