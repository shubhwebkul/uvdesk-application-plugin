<?php

namespace Webkul\UVDesk\CoreBundle\Package;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Webkul\UVDesk\PackageManager\Extensions\HelpdeskExtension;
use Webkul\UVDesk\PackageManager\ExtensionOptions\HelpdeskExtension\Section as HelpdeskSection;

class UVDeskCoreConfiguration extends HelpdeskExtension
{
    private $container;

    const APPLICATION_SHOPIFY_BRICK_SVG = <<<SVG
<g id="shopify" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g id="shopify-logo" transform="translate(7.000000, 4.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path d="M41.2070844,10.1136497 C41.2383967,10.3878149 47.0311859,48.4663151 46.9998735,48.5272407 L30.4669399,52 L0,46.4557704 C0,46.4557704 3.91404677,16.9982425 4.07060864,15.9625073 C4.25848289,14.5916813 4.28979525,14.5612185 5.7927892,14.1042765 C6.01197583,14.0128881 7.92203066,13.4645577 10.6148948,12.6420621 C11.6482032,8.37727007 14.9673148,0 21.8560372,0 C22.7327837,0 23.7974044,0.487404803 24.6115261,1.52314001 L24.8933374,1.52314001 C27.8680129,1.52314001 29.5275688,3.99062683 30.4982525,6.70181605 C31.4689359,6.39718805 32.0638712,6.21441125 32.0951835,6.21441125 C32.3456824,6.15348565 32.9406176,6.06209725 33.2537414,6.36672524 C33.5981775,6.64089045 36.4476035,9.41300527 36.4476035,9.41300527 C36.4476035,9.41300527 40.5495245,9.71763327 40.7373987,9.71763327 C40.925273,9.71763327 41.1757719,9.83948448 41.2070844,10.1136497 Z M28.8073842,7.12829526 C28.1498243,5.17867604 27.1791407,3.50322202 25.613522,3.32044522 C26.0205829,4.38664323 26.2397695,5.72700644 26.2397695,7.37199766 L26.2397695,7.92032806 C27.1478283,7.61570006 28.0558871,7.34153485 28.8073842,7.12829526 Z M23.7034672,3.65553602 C22.0752238,4.35618044 20.1025441,6.24487405 19.0692358,10.0831869 C20.9166659,9.50439367 22.7014711,8.98652606 24.3923394,8.46865847 L24.3923394,8.16403046 C24.3923394,6.15348565 24.1105281,4.69127124 23.7034672,3.65553602 Z M21.6994753,1.76684241 C16.7521201,1.76684241 13.9340065,8.10310486 12.806761,12.0023433 C14.1531931,11.5758641 15.5622499,11.1798477 17.0339315,10.7229057 C18.0046151,5.60515525 20.3530432,3.07674282 22.5762218,2.07147042 C22.3257227,1.88869362 22.0125989,1.76684241 21.6994753,1.76684241 Z M26.32,19.3236946 C26.32,19.3236946 24.8507283,18.5422171 21.9789699,18.5722739 C14.2652931,18.5722739 10.4585435,23.2010252 10.4585435,27.9800605 C10.4585435,33.6908574 16.736341,33.8411417 16.736341,37.2976766 C16.736341,38.1392678 16.0684902,39.2814272 14.4322558,39.2814272 C11.9612078,39.2814272 9.02266431,36.9971084 9.02266431,36.9971084 L7.52000001,41.4455186 C7.52000001,41.4455186 10.3249734,44.5714286 15.9349201,44.5714286 C20.5764831,44.5714286 24.0159147,41.4154618 24.0159147,36.5161992 C24.0159147,30.2944362 16.3356306,29.2725041 16.3356306,26.6275033 C16.3356306,26.1465941 16.5025933,24.1929005 19.9420248,24.1929005 C22.2461101,24.1929005 24.1828775,25.1246621 24.1828775,25.1246621 L26.32,19.3236946 Z" id="Combined-Shape"></path>
    </g>
</g>
SVG;

    const APPLICATION_EBAY_BRICK_SVG = <<<SVG
<g id="ebay" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g id="EBay_logo" transform="translate(0.000000, 18.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path d="M7.79862707,5.05263158 C3.54475161,5.05263158 0,6.80875087 0,12.1068826 C0,16.3041694 2.38358886,18.9473684 7.90846681,18.9473684 C14.4115069,18.9473684 14.8283753,14.7789473 14.8283753,14.7789473 L11.6773456,14.7789473 C11.6773456,14.7789473 11.0017384,17.0234818 7.71624716,17.0234818 C5.04030432,17.0234818 3.11566132,15.2644722 3.11566132,12.7989644 L15.1578947,12.7989644 L15.1578947,11.2518218 C15.1578947,8.81265949 13.56663,5.05263158 7.79862707,5.05263158 Z M7.68878712,7.02995944 C10.2360076,7.02995944 11.9725401,8.54842765 11.9725401,10.8242914 L3.18535468,10.8242914 C3.18535468,8.40818366 5.45197192,7.02995944 7.68878712,7.02995944 Z" id="e"></path>
        <path d="M15.22336,2.53784631e-16 L15.22336,16.2632761 C15.22336,17.1864312 15.1578947,18.4826469 15.1578947,18.4826469 L18.0457024,18.4826469 C18.0457024,18.4826469 18.1493556,17.5516865 18.1493556,16.7008793 C18.1493556,16.7008793 19.5761191,18.9473684 23.4555948,18.9473684 C27.540839,18.9473684 30.3157895,16.0928257 30.3157895,12.0030981 C30.3157895,8.19848359 27.7669077,5.13849448 23.4621901,5.13849448 C19.4311262,5.13849448 18.1785211,7.32932546 18.1785211,7.32932546 L18.1785211,0 L15.22336,2.53784631e-16 Z M22.7168035,7.1500756 C25.4910021,7.1500756 27.2550878,9.22228939 27.2550878,12.0030981 C27.2550878,14.9850108 25.2176277,16.9357873 22.7365932,16.9357873 C19.7756959,16.9357873 18.1785211,14.6090218 18.1785211,12.0296537 C18.1785211,9.6261853 19.6117129,7.1500756 22.7168035,7.1500756 Z" id="b"></path>
        <path d="M37.7894733,5.05263158 C31.656491,5.05263158 31.2631584,8.44366745 31.2631584,8.98554303 L34.3157891,8.98554303 C34.3157891,8.98554303 34.4758682,7.0058003 37.5789475,7.0058003 C39.5953786,7.0058003 41.1578956,7.93779934 41.1578956,9.72960727 L41.1578956,10.3673767 L37.5789475,10.3673767 C32.8276399,10.3673767 30.3157895,11.7709456 30.3157895,14.6191728 C30.3157895,17.4222375 32.6366589,18.9473684 35.7730268,18.9473684 C40.0474092,18.9473684 41.4243413,16.5623766 41.4243413,16.5623766 C41.4243413,17.5109958 41.4967677,18.4457894 41.4967677,18.4457894 L44.2105263,18.4457894 C44.2105263,18.4457894 44.1052625,17.2870835 44.1052625,16.5457679 L44.1052625,10.1381783 C44.1052625,5.93680956 40.7493135,5.05263158 37.7894733,5.05263158 Z M41.1578956,12.2806849 L41.1578956,13.1310441 C41.1578956,14.2401444 40.4801457,16.9975213 36.4901324,16.9975213 C34.3052147,16.9975213 33.3684221,15.8963975 33.3684221,14.6191728 C33.3684221,12.2956491 36.523153,12.2806849 41.1578956,12.2806849 Z" id="a"></path>
        <polygon id="y" points="42.9473684 6.31578947 46.3878807 6.31578947 51.3254939 16.248979 56.2518103 6.31578947 59.3684211 6.31578947 50.3952199 24 47.126074 24 49.7154036 19.0702851"></polygon>
    </g>
</g>
SVG;

    const APPLICATION_AMAZON_BRICK_SVG = <<<SVG
<g id="amazon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g id="Amazon.com-Logo" transform="translate(8.000000, 9.000000)" fill="#FFFFFF">
        <path d="M40.6760202,37.5050674 C35.7483393,41.0882452 28.6059667,43 22.456517,43 C13.8339962,43 6.07151504,39.8537975 0.198897919,34.6210495 C-0.262494734,34.2095646 0.15091145,33.648785 0.704585449,33.9692299 C7.042284,37.6070289 14.8785928,39.7955344 22.9732793,39.7955344 C28.432483,39.7955344 34.4379805,38.681252 39.9599373,36.3689393 C40.7941371,36.0193594 41.4917634,36.9078718 40.6760202,37.5050674 Z M42.7246086,35.1927547 C42.0971113,34.3989214 38.560993,34.8176872 36.9738,35.0034007 C36.4902578,35.0616638 36.4164372,34.6465398 36.8519901,34.3479393 C39.6683367,32.3924875 44.2896549,32.9569103 44.8285625,33.612369 C45.3674673,34.271471 44.6882989,38.8414779 42.0417444,41.0226969 C41.6357186,41.3577093 41.2481479,41.179281 41.4290162,40.7350234 C42.0232893,39.2711652 43.3557948,35.9902299 42.7246086,35.1927547 Z" id="Combined-Shape"></path>
        <path d="M26.8740747,18.9958185 C26.8740747,21.3138084 26.9337913,23.2468626 25.739348,25.3054422 C24.7752518,26.9790861 23.2480652,28.0083743 21.5417094,28.0083743 C19.2125336,28.0083743 17.8559837,26.2677831 17.8559837,23.6987457 C17.8559837,18.627618 22.4887368,17.7071167 26.8740747,17.7071167 L26.8740747,18.9958185 M32.9913568,33.4979081 C32.5903638,33.8493734 32.0101981,33.8744778 31.5580148,33.6401719 C29.5445203,32.0000049 29.1861816,31.2384994 28.0770504,29.6736457 C24.7496566,33.0041886 22.3948922,34 18.0778073,34 C12.975802,34 9,30.9121354 9,24.7280402 C9,19.8995845 11.6704456,16.6108813 15.4670848,15.0041879 C18.7603503,13.5815884 23.3589787,13.3305472 26.8740747,12.9372423 L26.8740747,12.1673677 C26.8740747,10.7531374 26.9849881,9.07949669 26.1403413,7.85774542 C25.3980716,6.76150675 23.9818018,6.30962374 22.7361588,6.30962374 C20.4240519,6.30962374 18.3593573,7.47280331 17.8559837,9.88284497 C17.7535998,10.4184137 17.3526068,10.94561 16.8065756,10.9707144 L10.91965,10.3514632 C10.4248059,10.2426826 9.87877147,9.84937133 10.0152801,9.10460751 C11.3718333,2.10879164 17.8133229,0 23.5808088,0 C26.5327983,0 30.3891605,0.769874641 32.7183363,2.96234241 C35.6703352,5.66527127 35.3887819,9.27196615 35.3887819,13.1966558 L35.3887819,22.468622 C35.3887819,25.2552366 36.5661723,26.4769878 37.6753034,27.9832698 C38.0677636,28.518829 38.1530819,29.1631815 37.6582378,29.5648556 C36.4211309,30.5774118 34.2199342,32.4602571 33.0084159,33.5146497 L32.9913568,33.4978922" id="path30"></path>
    </g>
</g>
SVG;

    const APPLICATION_MAGENTO_BRICK_SVG = <<<SVG
<g id="magento" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g transform="translate(15.000000, 6.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path d="M26.7417636,35.1718346 L26.7417636,17.7622739 L15.1107074,11.8113695 L4.18846899,18.0788114 L4.18846899,35.4883721 L0,32.7661499 L0,15.5781654 L15.1751453,7 L30.9302326,15.5781654 L30.9302326,32.7344961 L26.7417636,35.1718346 Z M13.1860465,35.7054264 L15.627907,37.216124 L17.744186,35.7054264 L17.744186,18.3953488 L21.9767442,21.1334884 L21.9767442,38.2232558 L15.7255814,42 L8.95348837,38.2232558 L8.95348837,21.1334884 L13.1860465,18.3953488 L13.1860465,35.7054264 Z" id="m"></path>
        <path d="M30,12 C26.7,12 24,9.3 24,6 C24,2.7 26.7,0 30,0 C33.3,0 36,2.7 36,6 C36,9.3 33.3,12 30,12 Z M30,0.78 C27.06,0.78 24.72,3.12 24.72,6.06 C24.72,9 27.06,11.34 30,11.34 C32.94,11.34 35.28,9 35.28,6.06 C35.28,3.12 32.94,0.78 30,0.78 Z" id="circle"></path>
        <path d="M30.5675676,6.6 L28.9459459,6.6 L28.9459459,9 L28,9 L28,3 L30.2972973,3 C31.0405405,3 31.6486486,3.18 32.0540541,3.48 C32.4594595,3.78 32.7297297,4.26 32.7297297,4.86 C32.7297297,5.22 32.6621622,5.52 32.3918919,5.82 C32.1216216,6.12 31.7837838,6.3 31.3783784,6.42 L33,9 L31.9864865,9 L30.5675676,6.6 Z M28.8783784,5.94 L30.2972973,5.94 C30.7027027,5.94 31.1756757,5.88 31.3783784,5.64 C31.6486486,5.4 31.7837838,5.16 31.7837838,4.8 C31.7837838,4.44 31.5810811,4.14 31.3783784,3.96 C31.1081081,3.72 30.7702703,3.66 30.2972973,3.66 L28.8783784,3.66 L28.8783784,5.94 Z" id="r"></path>
    </g>
</g>
SVG;
    public function loadDashboardItems()
    {
        return [
            HelpdeskSection::APPS => [
                [
                    'name' => 'Shopify',
                    'route' => 'helpdesk_member_load_application_shopify',
                    'brick_svg' => self::APPLICATION_SHOPIFY_BRICK_SVG,
                    'permission'=>'ROLE_ADMIN'
                ],
                [
                    'name' => 'eBay',
                    'route' => 'helpdesk_member_load_application_eBay',
                    'brick_svg' => self::APPLICATION_EBAY_BRICK_SVG,
                    'permission'=>'ROLE_ADMIN'
                ],
                [
                    'name' => 'Magento',
                    'route' => 'helpdesk_member_load_application_eBay',
                    'brick_svg' => self::APPLICATION_MAGENTO_BRICK_SVG,
                    'permission'=>'ROLE_ADMIN'
                ],
                [
                    'name' => 'Amazon',
                    'route' => 'helpdesk_member_load_application_eBay',
                    'brick_svg' => self::APPLICATION_AMAZON_BRICK_SVG,
                    'permission'=>'ROLE_ADMIN'
                ],
            ],
        ];
    }
}
