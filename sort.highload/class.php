<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main,
    Bitrix\Main\Application,
    Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc,
    Bitrix\Iblock\Model\Section,
    Bitrix\Highloadblock as HL;

class CComponentSortHL extends \CBitrixComponent
{
  /**
   * получение языковых файлов
   */
  public function onIncludeComponentLang()
  {
    $this->includeComponentLang(basename(__FILE__));
    Loc::loadMessages(__FILE__);
  }
  /**
   * проверка подключения обязательных модулей
   */
  protected function checkModules()
  {
    if (!Loader::includeModule("highloadblock")) {
      throw new Main\LoaderException(Loc::getMessage("STANDARD_SALE_MODULE_NOT_INSTALLED"));
    }
  }
  /**
   * проверка передаваемых параметров
   */
  protected function checkParams()
  {
    if ($this->arParams["HL_ID"] <= 0) {
      throw new Main\ArgumentNullException("HL_ID");
    }
  }
  /**
   * получение выбранной сортировки
   */
  protected function checkSort(): array
  {
    $arSort = [];

    $request = Application::getInstance()->getContext()->getRequest();
    $sort = $request->getQuery("sort");
    $order = $request->getQuery("order");
    if(!empty($sort) && !empty($order)) {
      $arSort = [
        "SORT"  => $sort,
        "ORDER" => $order,
      ];
    } elseif(!empty($this->arParams["SECTION_ID"])) {
      $arSort = self::getSortSection($this->arParams["SECTION_ID"]);
    }

    return $arSort;
  }
  /**
   * получение сортировки по умолчанию из раздела
   */
  protected function getSortSection(int $id): array
  {
    $arSort = [];

    if(!empty($id)) {
      $entitySection = Section::compileEntityByIblock(CATALOG_IBLOCK_ID);
      $arSection = $entitySection::getList([
        "select" => ["ID", "UF_DEFAULT_SORT"],
        "filter" => ["ID" => $id],
      ])->fetch();
      if(!empty($arSection["UF_DEFAULT_SORT"])) {
        $hlBlock = HL\HighloadBlockTable::getById($this->arParams["HL_ID"])->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($hlBlock);
        $entityClass = $entity->getDataClass();
        $arData = $entityClass::getList([
          "filter" => ["ID" => $arSection["UF_DEFAULT_SORT"]]
        ])->fetch();
        if(!empty($arData)) {
          $arSort = [
            "SORT"  => $arData["UF_VALUE_SORT"],
            "ORDER" => $arData["UF_VALUE_ORDER"],
          ];

          $_SESSION["sort"] = $arData["UF_VALUE_SORT"];
          $_SESSION["order"] = $arData["UF_VALUE_ORDER"];
        }
      }
    }

    return $arSort;
  }
  /**
   * получение списка сортировки
   */
  protected function getItems(): array
  {
    $hlBlock = HL\HighloadBlockTable::getById($this->arParams["HL_ID"])->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlBlock);
    $entityClass = $entity->getDataClass();
    $dbData = $entityClass::getList([
      "order" => ["UF_SORT" => "ASC"]
    ])->fetchAll();
    if(!empty($dbData)) {
      return $dbData;
    }

    return [];
  }
  /**
   * получение результата работы компонента
   */
  protected function getResult()
  {
    $this->arResult = [
      "SORT"  => self::checkSort(),
      "ITEMS" => self::getItems(),
    ];
  }
  /**
   * инициализация работы компонента
   */
  public function executeComponent()
  {
    try {
      $this->checkModules();
      $this->checkParams();
      $this->getResult();
      $this->includeComponentTemplate();
    }
    catch (Exception $e){
      ShowError($e->getMessage());
    }
  }
}