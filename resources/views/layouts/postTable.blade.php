

<table class="table table-bordered">
                <thead> 
                    <th>Tytuł</th>
                    <th>Podtytuł</th>
                    <th style="width: 200px">Data utworzenia</th>
                    <th width="200px">Akcja</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->header }}</td>
                    <td>{{ $post->subheader }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="{{ route('showpost', $post->id) }}" class="btn btn-info" style='width: 200px; margin-bottom: 2%'>Wyswietl post</a>
                        @auth
                        @if($post->author_id == Auth::user()->id)
                        <a href="{{ route('editpost', $post->id) }}" class="btn btn-warning" style='width: 200px; margin-bottom: 2%'>Edytuj post</a>
                        <a href="{{ route('deletepost', $post->id) }}" class="btn btn-danger" style='width: 200px'>Usuń post</a>
                        @endif
                        @endauth
                    </td>
                </tr>
                @endforeach
                </tbody>
                
            </table>