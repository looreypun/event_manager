<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EventController extends Controller
{
    /**
     * Retrieve a paginated list of events from the database.
     *
     * @return View The view displaying the list of events.
     */
    public function index(): View
    {
        $user = auth()->user();
        $query = Event::with(['rlUser'])->orderBy('hold_date', 'asc');

        if (!$user->hasRole('admin')) {
            $query->where('user_id', $user->id);
        }

        $events = $query->paginate(12);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Display the specified event.
     *
     * @param int $id The ID of the event to display.
     * @return View A view object that renders the specified event.
     * @throws ModelNotFoundException If the event with the given ID is not found.
     */
    public function show(int $id): View
    {
        $event = Event::findOrFail($id);

        return view('admin.event.show', compact('event'));
    }


    /**
     * Display the form for creating a new event.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.event.create');
    }

    /**
     * Store a new event in the database.
     *
     * @param Request $request The HTTP request object containing the event data.
     * @return RedirectResponse A redirect response to the previous page.
     */
    public function store(Request $request): RedirectResponse
    {
        $event_data = $request->only([
            'name', 'description', 'hold_date', 'premium_ticket_price',
            'normal_ticket_price', 'venue'
        ]);
        $event_data['user_id'] = auth()->id();

        $this->handleImageUpload($request, $event_data);

        Event::create($event_data);

        return redirect()->back();
    }

    /**
     * Updates an event with the given request data.
     *
     * @param Request $request The request object containing the updated event data.
     * @param int $id The ID of the event to be updated.
     * @return RedirectResponse The redirection response to the previous page.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $event = Event::findOrFail($id);

        $event->fill($request->only([
            'name', 'description', 'hold_date', 'premium_ticket_price',
            'normal_ticket_price', 'venue'
        ]));

        $this->handleImageUpload($request, $event);

        $event->save();

        return redirect()->back();
    }

    /**
     * Handles the upload of multiple images and updates the provided data array with their storage paths.
     *
     * @param Request $request The HTTP request containing the uploaded images.
     * @param array $data The data array to be updated with the storage paths.
     */
    private function handleImageUpload(Request $request, array &$data): void
    {
        $image_fields = ['image-main', 'image-sub-one', 'image-sub-two', 'image-sub-three', 'image-sub-four'];

        foreach ($image_fields as $field) {
            if ($request->hasFile($field)) {
                $imageKey = $field === 'image-main' ? 'main_img_url' : 'sub_img_url_' . substr($field, strlen('image-sub-'));
                $data[$imageKey] = $this->uploadImage($request->file($field));
            }
        }
    }

    /**
     * Delete event.
     *
     * @param int $id The identifier of the data to be destroyed.
     * @return RedirectResponse The redirect response that redirects the user back to the previous page.
     */
    public function destroy(int $id)
    {
        Event::destroy($id);

        return redirect()->back();
    }


    /**
     * Uploads an image and returns the storage path of the uploaded image.
     *
     * @param UploadedFile $image The image to be uploaded.
     * @return string The storage path of the uploaded image.
     */
    public function uploadImage(UploadedFile $image)
    {
        $image_name = time() . '_' . $image->getClientOriginalName();

        $img = \Image::make($image)->fit(300, 200);
        $img->save(public_path('storage/images/events/'.$image_name));

        return '/storage/images/events/' . $image_name;
    }
}
