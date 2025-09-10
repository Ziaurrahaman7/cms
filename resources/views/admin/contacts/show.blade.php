@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Contact Details</h1>
                <p class="text-gray-600 mt-1">View and manage contact form submission</p>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Contacts
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Contact Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-12 w-12">
                            <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-lg font-medium text-blue-600">{{ substr($contact->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-medium text-gray-900">{{ $contact->name }}</div>
                            <div class="text-sm text-gray-500">Submitted {{ $contact->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="text-sm text-gray-900">
                                <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                            </div>
                        </div>
                        
                        @if($contact->phone)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <div class="text-sm text-gray-900">
                                <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-800">{{ $contact->phone }}</a>
                            </div>
                        </div>
                        @endif
                        
                        @if($contact->company)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                            <div class="text-sm text-gray-900">{{ $contact->company }}</div>
                        </div>
                        @endif
                        
                        @if($contact->service)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service Interested In</label>
                            <div class="text-sm">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                    {{ $contact->service }}
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Message -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="mailto:{{ $contact->email }}?subject=Re: Your inquiry about {{ $contact->service ?? 'our services' }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Reply via Email
                    </a>
                    
                    @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Call Now
                    </a>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Status & Actions -->
        <div class="space-y-6">
            <!-- Status -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status</h3>
                
                <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="radio" id="status_new" name="status" value="new" {{ $contact->status === 'new' ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="status_new" class="ml-2 text-sm text-gray-900">New</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" id="status_read" name="status" value="read" {{ $contact->status === 'read' ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="status_read" class="ml-2 text-sm text-gray-900">Read</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" id="status_replied" name="status" value="replied" {{ $contact->status === 'replied' ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="status_replied" class="ml-2 text-sm text-gray-900">Replied</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Update Status
                    </button>
                </form>
            </div>
            
            <!-- Submission Details -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Submission Details</h3>
                
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="text-gray-500">Submitted:</span>
                        <div class="font-medium">{{ $contact->created_at->format('F j, Y') }}</div>
                        <div class="text-gray-600">{{ $contact->created_at->format('g:i A') }}</div>
                    </div>
                    
                    <div>
                        <span class="text-gray-500">Time ago:</span>
                        <div class="font-medium">{{ $contact->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Delete -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-red-600 mb-4">Danger Zone</h3>
                
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors">
                        Delete Contact
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection