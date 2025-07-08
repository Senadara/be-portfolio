<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Portfolios</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($portfolios as $portfolio)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($portfolio->hasImage('image'))
                    <img src="{{ $portfolio->getImageUrl('image') }}" 
                         alt="{{ $portfolio->title }}" 
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $portfolio->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $portfolio->description }}</p>
                    
                    @if($portfolio->link)
                        <a href="{{ $portfolio->link }}" 
                           target="_blank" 
                           class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            View Project
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html> 