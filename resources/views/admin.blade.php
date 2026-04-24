<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-7xl mx-auto">
        <div class="bg-indigo-600 text-white p-6 rounded-xl mb-6">
            <h1 class="text-2xl font-bold">📋 Admin Panel — Contact Submissions</h1>
            <p class="text-indigo-200 mt-1">
                Total: <span class="font-bold text-white">{{ $contacts->count() }}</span> submissions
            </p>
        </div>

        @if($contacts->isEmpty())
            <div class="bg-white p-10 rounded-xl text-center text-gray-400">
                <p class="text-4xl mb-3">📭</p>
                <p class="text-lg">No submissions yet!</p>
            </div>
        @else
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                            <th class="px-4 py-3 text-left">Service</th>
                            <th class="px-4 py-3 text-left">Message</th>
                            <th class="px-4 py-3 text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($contacts as $contact)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-400">{{ $contact->id }}</td>
                            <td class="px-4 py-3 font-medium">{{ $contact->name }}</td>
                            <td class="px-4 py-3 text-indigo-600">{{ $contact->email }}</td>
                            <td class="px-4 py-3">{{ $contact->phone ?? '—' }}</td>
                            <td class="px-4 py-3">
                                <span class="bg-indigo-50 text-indigo-700 px-2 py-1 rounded-full text-xs">
                                    {{ $contact->service ?? 'Not specified' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600 max-w-xs truncate">
                                {{ $contact->message }}
                            </td>
                            <td class="px-4 py-3 text-gray-400 text-xs">
                                {{ $contact->created_at->format('d M Y, h:i A') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6 text-center">
            <a href="/" class="text-indigo-600 hover:underline text-sm">← Back to Website</a>
        </div>
    </div>
</body>
</html>
