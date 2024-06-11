@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Nome del progetto : {{$project->name}}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary"> Nome del cliente : {{$project->client_name}}</h6>
      <p class="card-text"> Descrizione progetto : {{$project->summary}}</p>
      <div> slug : {{$project->slug}}</div>
      <div>tipo: {{$project->type ? $project->type->name : 'tipo non trovato'}}</div>
      <div>Tecnologie utilizzate :</div>
      @if (count($project->technologies) >0)
        @foreach ($project->technologies as $technology)
        {{$technology->name}}
        
        @endforeach
      @else 
        <div>nessuna tecnologia utilizzata</div>  
      @endif
      
      @if ($project->cover_image)
        <div>
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}" style="width : 150px">
        </div>
      @endif

      <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">modifica</a>
    </div>
</div>
@endsection