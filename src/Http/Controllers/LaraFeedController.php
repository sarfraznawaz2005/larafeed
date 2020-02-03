<?php

namespace Sarfraznawaz2005\LaraFeed\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Sarfraznawaz2005\LaraFeed\Events\FeedbackReceivedEvent;
use Sarfraznawaz2005\LaraFeed\Models\LaraFeedModel;
use Sarfraznawaz2005\LaraFeed\Notifications\LaraFeedNotification;
use Sarfraznawaz2005\LaraFeed\Recipients\DynamicRecipient;

class LaraFeedController extends Controller
{
    use ValidatesRequests;

    public function __invoke(Request $request, LaraFeedModel $model)
    {
        if (!config('larafeed.enabled')) {
            return false;
        }

        $this->validate($request, ['name' => 'required', 'email' => 'required', 'message' => 'required']);

        DB::beginTransaction();

        $model->fill(\request()->all());

        if ($model->save()) {

            if (config('larafeed.screenshots.capture_screenshots', true)) {
                $this->saveScreenshot($request, $model->id . '.png');

                $model->screenshot = $model->id . '.png';
                $model->save();
            }

            $this->sendMail($model);

            event(new FeedbackReceivedEvent(collect($model)));

            if (config('larafeed.store_in_db', true)) {
                DB::commit();
            }

            return \back()->with('message', config('larafeed.feedback.success_message'));
        }

        return \back();
    }

    /**
     * @param LaraFeedModel $model
     */
    protected function sendMail(LaraFeedModel $model)
    {
        try {
            if ($emails = config('larafeed.mail.mail_receivers', [])) {
                foreach ($emails as $email) {
                    $recipient = new DynamicRecipient($email);
                    $recipient->notify(new LaraFeedNotification($model));
                }
            }
        } catch (\Exception $e) {
            Log::warning('LaraFeed - Could not send email: ' . $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $name
     */
    protected function saveScreenshot(Request $request, $name)
    {
        $outputPath = config('larafeed.screenshots.screenshots_store_folder');
        @mkdir($outputPath);

        $screenshotData = substr($request->screenshot, strpos($request->screenshot, ',') + 1);

        @file_put_contents($outputPath . DIRECTORY_SEPARATOR . $name, base64_decode($screenshotData));
    }
}
