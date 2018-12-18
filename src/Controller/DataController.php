<?php

namespace Guozheng\TangShi\Controller;

use Guozheng\TangShi\Model\TangShi;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\map;

/**
 * Created by PhpStorm.
 * User: 20847
 * Date: 2018/12/15
 * Time: 20:05
 */
class DataController extends \App\Http\Controllers\Controller
{

    public function index()
    {
        try {
            if (DB::table('tangshis')
                ->insert($this->getList()
                )
            ) {
                TangShi::all()->map(function ($item) {
                    TangShi::where('id', $item->id)
                        ->update([
                            'detail' => $this->getDetail($item->detail_url)
                        ]);
                });
            }
            return Response('ok', 200);
        } catch (\Exception $e) {
            // echo 'error: ' . $e->getMessage();
            echo 'error: update table error!';// . $e->getMessage();
            exit();
        }
    }

    private function getList()
    {
        $string = file_get_contents('https://www.lz13.cn/ziliao/tangshisanbaishouquanji.html');

        preg_match_all('/liebiaoList\"\>([\s\S]*)cmboxleft\"\>/', $string, $liebiaoList, PREG_PATTERN_ORDER);

        preg_match_all('/https:\/\/www\.lz13\.cn\/shiju\/\d*\.html/', $liebiaoList[1][0], $detailUrls);
        preg_match_all('/>([^<>]*)</', $liebiaoList[1][0], $titles);

        $titleList = array();
        collect($titles[1])->map(function ($item) use (&$titleList) {
            if(preg_match('/[\x{4e00}-\x{9fa5}]/u', $item)>0 && strpos($item, '唐诗三百首') === false) {
                $titleList[] = $item;
            }
        });

        $titles = array_values(array_unique(array_values($titleList)));
        $detailUrl = array_values(array_unique(array_values($detailUrls)[0]));


        $urls = array();
        collect($detailUrl)->map(function ($item) use (&$urls) {
            if (strpos($item, '54824') === false) {
                $urls[] = $item;
            }
        });

        $tangshiList = array();
        foreach ($titles as $key => $item) {
            $tangshiList[] = [
                'title' => $item,
                'detail_url' => $urls[$key],
                'tag' => '',
                'detail' => ''
            ];
        }

        return $tangshiList;
    }

    private function getDetail($detailUrl)
    {
        $string = file_get_contents($detailUrl);

        preg_match_all('/box5\"\>([\s\S]*)\"pager\"\>/', $string, $detail);
        preg_match_all('/\<p\>([\s\S]*)<\/p\>/', $detail[1][0], $tangshiDetail);

        return $tangshiDetail[0][0];
    }
}
