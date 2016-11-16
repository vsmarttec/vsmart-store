<?php class Infortis_UltraMegamenu_Block_Navigation extends Mage_Catalog_Block_Navigation
{
    const DDTYPE_NONE = 0;
    const DDTYPE_MEGA = 1;
    const DDTYPE_CLASSIC = 2;
    const DDTYPE_SIMPLE = 3;
    protected $p0b;
    protected $p0c = FALSE;
    protected $p0d;
    protected $p0e = FALSE;
    protected $p0f = NULL;
    protected $p10 = NULL;

    protected function _construct()
    {
        parent::_construct();
        $this->addData(array('cache_lifetime' => false));
        $this->p0b = array(self::DDTYPE_MEGA => "me\x67a", self::DDTYPE_CLASSIC => "\x63\154\x61\163si\143", self::DDTYPE_SIMPLE => "\x73im\160\154\145");
        $this->p0c = FALSE;
        $this->p0d = "\043@#";
        $this->p0e = FALSE;
        $this->p0f = NULL;
        if (Mage::registry('current_category')) {
            $this->p10 = Mage::registry('current_category')->getId();
        }
    }

    /*public function getCacheKeyInfo()
    {
        $x11 = array('CATALOG_NAVIGATION', Mage::app()->getStore()->getId(), Mage::getDesign()->getPackageName(), Mage::getDesign()->getTheme('template'), Mage::getSingleton('customer/session')->getCustomerGroupId(), 'template' => $this->getTemplate(), 'name' => $this->getNameInLayout(), $this->getCurrenCategoryKey(), Mage::helper('ultramegamenu')->getIsOnHome(), (int)Mage::app()->getStore()->isCurrentlySecure(),);
        $x12 = $x11;
        $x11 = array_values($x11);
        $x11 = implode('|', $x11);
        $x11 = md5($x11);
        $x12['category_path'] = $this->getCurrenCategoryKey();
        $x12['short_cache_id'] = $x11;
        return $x12;
    }*/

    protected function x0b($x13, $x14 = 0, $x15 = FALSE, $x16 = FALSE, $x17 = FALSE, $x18 = '', $x19 = '', $x1a = FALSE, $x1b = null)
    {
        if (!$x13->getIsActive()) {
            return '';
        }
        $x1c = '';
        if (Mage::helper('catalog/category_flat')->isEnabled()) {
            $x1d = (array)$x13->getChildrenNodes();
            $x1e = count($x1d);
        } else {
            $x1d = $x13->getChildren();
            $x1e = $x1d->count();
        }
        $x1f = ($x1d && $x1e);
        $x20 = array();
        foreach ($x1d as $x21) {
            if ($x21->getIsActive()) {
                $x20[] = $x21;
            }
        }
        $x22 = count($x20);
        $x23 = ($x22 > 0);
        $x24 = Mage::helper('ultramegamenu'); /*$x25 = Mage::getModel('catalog/category')->load($x13->getId());*/
        $x25 = $x13; /**/
        $x26 = intval($x25->getData('umm_dd_type'));
        if ($x26 === self::DDTYPE_NONE) {
            if ($x1b["\x64\x64\x54\x79\160\145"] === self::DDTYPE_MEGA) {
            } else {
                $x26 = self::DDTYPE_CLASSIC;
            }
        } elseif ($x26 === self::DDTYPE_MEGA) {
            if ($x1b["d\x64\x54\x79\x70\145"] === self::DDTYPE_MEGA) {
                $x26 = self::DDTYPE_NONE;
            }
        } elseif ($x26 === self::DDTYPE_SIMPLE) {
            if ($x1b["dd\x54\171p\145"] === self::DDTYPE_MEGA) {
                $x26 = self::DDTYPE_NONE;
            } elseif ($x14 === 0) {
                $x26 = self::DDTYPE_CLASSIC;
            }
        }
        $x27 = array("\x64d\x54\171\160\x65" => $x26,);
        $x28 = FALSE;
        $x29 = array();
        $x2a = '';
        $x2b = '';
        $x2c = FALSE;
        $x2d = "l\145\x76\145l" . $x14;
        if (FALSE === $this->p0c && ($x26 === self::DDTYPE_MEGA || $x1b["d\144T\x79\x70e"] === self::DDTYPE_MEGA)) {
            $x28 = TRUE;
        }
        if ($x28) {
            $x2e = $this->x10($x25, "\165\x6d\155_\144\144\x5fbl\x6fck\x73");
            if ($x2e) {
                $x29 = explode($this->p0d, $x2e);
            }
        }
        if (FALSE === $this->p0c && $x26 === self::DDTYPE_MEGA) {
            $x2f = $x25->getData("u\155\155_\144d\x5fp\x72o\160\x6f\162t\151o\156s");
            if ($x2f) {
                $x30 = explode("\x3b", $x2f);
                $x31 = $x30[0];
                $x32 = $x30[1];
                $x33 = $x30[2];
            } else {
                $x31 = $x32 = $x33 = 4;
            }
            $x34 = "\147r\151\x641\x32-" . $x31;
            $x35 = "\x67\x72i\1441\x32\x2d" . $x32;
            $x36 = "\x67r\151\1441\062\x2d" . $x33;
            if (empty($x29[1]) && empty($x29[2])) {
                $x34 = '';
                $x35 = "\147\162\151\x64\x31\x32\x2d\0612";
                $x36 = '';
            } elseif (empty($x29[1])) {
                $x34 = '';
                $x35 = "\147\162\x69\x64\x31\x32-" . ($x31 + $x32);
            } elseif (empty($x29[2])) {
                $x35 = "gr\151\x64\x31\x32\055" . ($x32 + $x33);
                $x36 = '';
            } elseif (!$x23) {
                $x34 = "\147r\x69\x641\x32-" . ($x31 + $x32);
                $x35 = '';
                $x36 = "\147\162i\144\x31\062\x2d" . $x33;
            }
            if (!empty($x29[0])) {
                $x2c = TRUE;
                $x2a .= '<div class="nav-block nav-block--top std grid-full">' . $x29[0] . '</div>';
            }
            if (!empty($x29[1])) {
                $x2c = TRUE;
                $x2a .= '<div class="nav-block nav-block--left std ' . $x34 . '">' . $x29[1] . '</div>';
            }
            if ($x23) {
                $x2a .= '<div class="nav-block--center ' . $x35 . '">';
                $x2b .= '</div>';
            }
            if (!empty($x29[2])) {
                $x2c = TRUE;
                $x2b .= '<div class="nav-block nav-block--right std ' . $x36 . '">' . $x29[2] . '</div>';
            }
            if (!empty($x29[3])) {
                $x2c = TRUE;
                $x2b .= '<div class="nav-block nav-block--bottom std grid-full">' . $x29[3] . '</div>';
            }
        }
        $x37 = ($x23 || $x2c) ? TRUE : FALSE;
        $x38 = array("\x6e\141v\055\151t\x65\155");
        $x39 = array();
        $x3a = array();
        $x3b = array("n\141\166-\163\165b\x6d\x65\x6e\x75");
        $x3c = '';
        $x3d = '';
        $x3e = '';
        $x38[] = $x2d;
        $x38[] = "\x6e\141v-" . $this->_getItemPosition($x14);
        if ($this->isCategoryActive($x13)) {
            $x38[] = "\x61c\x74\151ve";
            if ($x13->getId() === $this->p10) {
                $x38[] = "cu\x72\162\x65\x6e\164";
            }
        }
        if ($x17 && $x18) {
            $x38[] = $x18;
            $x39[] = $x18;
        }
        if ($x16) {
            $x38[] = "\x66i\x72s\x74";
        }
        if ($x15) {
            $x38[] = "\154\141\x73t";
        }
        if (FALSE === $this->p0c) {
            if ($x26 === self::DDTYPE_CLASSIC) {
                if ($x37) {
                    $x38[] = "n\x61v\055\151\164\145\x6d\x2d-\160\141r\145\156t";
                    $x3b[] = "\156\141\x76\055\160ane\154-\055d\162o\x70\x64\x6f\167n";
                }
                $x38[] = $this->p0b[self::DDTYPE_CLASSIC];
                $x3b[] = "\x6ea\x76\055\x70a\156\145l";
            } elseif ($x26 === self::DDTYPE_MEGA) {
                if ($x37) {
                    $x38[] = "nav\055\151tem-\055\x70\x61r\x65\156t";
                    $x3a[] = "\x6ea\x76\055\x70a\x6e\x65\154\055\x2d\144r\157pdo\167\156";
                }
                $x38[] = $this->p0b[self::DDTYPE_MEGA];
                $x3a[] = "\156av\055\x70\141\156\x65l";
                if ($x19) {
                    $x3a[] = $x19;
                }
                $x3b[] = "\x6e\141v\x2dsu\x62\x6d\145\x6eu\x2d-m\x65ga";
                $x3f = intval($x25->getData("\165\155\155\x5f\144\144_\x63\x6fl\x75\155\x6e\163"));
                if ($x3f === 0) {
                    $x3f = 4;
                }
                $x3b[] = "dd-\151\164\x65m\147rid\x20\144\x64-\151\x74\145\x6d\147\x72i\144-" . $x3f . "c\157\154";
            } elseif ($x26 === self::DDTYPE_SIMPLE) {
                $x38[] = $this->p0b[self::DDTYPE_SIMPLE];
                $x3b[] = "\156\141\166\055pa\x6e\145\x6c";
            } elseif ($x26 === self::DDTYPE_NONE) {
                $x3b[] = "na\x76-\160\141\x6e\x65\154";
            }
            if ($x40 = $x25->getData("u\x6dm_\144\x64_\x77idth")) {
                $x41 = '';
                $x42 = '';
                if (strpos($x40, "px") || strpos($x40, "\x25")) {
                    $x41 = ' style="width:' . $x40 . ';"';
                } else {
                    $x42 = intval($x40);
                    if (0 < $x42 && $x42 <= 12) {
                        $x42 = "\156\157-\147\165\x74\x74\145\162\x20\x67r\151\x641\x32-" . $x42;
                    } else {
                        $x42 = '';
                    }
                }
                if ($x26 === self::DDTYPE_CLASSIC) {
                    $x3d = $x41;
                } elseif ($x26 === self::DDTYPE_MEGA) {
                    $x3c = $x41;
                    if ($x42) {
                        $x3a[] = $x42;
                    }
                }
            } else {
                if ($x26 === self::DDTYPE_MEGA) {
                    $x3a[] = "\146\165ll\x2d\167id\x74h";
                }
            }
            if ($x2c) {
                if (FALSE === $x23) {
                    $x38[] = "n\141\x76\x2d\151\x74\145m-\055o\156\154\171\x2d\x62\154\x6f\x63\x6b\x73";
                }
            } else {
                if ($x23) {
                    $x38[] = "n\141v\x2d\x69t\145\x6d\055\x2do\156\x6cy-\x73\165\x62c\141tego\162\x69es";
                }
            }
        }
        if ($x37) {
            $x38[] = "p\141r\145n\164";
            if (FALSE === $this->p0c) {
                $x3e = '<span class="caret">&nbsp;</span>';
            }
        }
        $x43 = '';
        if ($this->p0e && $this->p0c) {
            $x43 = '<span class="number">(' . $this->x0f($x25) . ')</span>';
        }
        $x44 = $this->x11($x25, $x14);
        if ($x45 = $x25->getData("u\x6d\155\137\143\x61\x74_\x74\x61\162g\145\x74")) {
            if ($x45 === "\x23") {
                $x46 = "\x23";
                $x39[] = "n\157\x2d\x63\154\x69\x63k";
            } elseif ($x45 = trim($x45)) {
                if (strpos($x45, "\150\x74t\x70") === 0) {
                    $x46 = $x45;
                } else {
                    $x46 = Mage::getBaseUrl() . $x45;
                }
            } else {
                $x46 = $this->getCategoryUrl($x13);
            }
        } else {
            $x46 = $this->getCategoryUrl($x13);
        }
        $x1c .= "\074\x6c\151" . ($x38 ? ' class="' . implode(" ", $x38) . '"' : '') . "\x3e";
        if (FALSE === $this->p0c && $x1b["d\x64\x54\171\160e"] === self::DDTYPE_MEGA) {
            if (!empty($x29[0])) {
                $x1c .= '<div class="nav-block nav-block--top std">' . $x29[0] . '</div>';
            }
        }
        $x1c .= '<a href="' . $x46 . '"' . ($x39 ? ' class="' . implode("\040", $x39) . '"' : '') . '>';
        $x1c .= '<span>' . $this->escapeHtml($x13->getName()) . $x43 . $x44 . '</span>' . $x3e;
        $x1c .= '</a>';
        $x47 = '';
        $x48 = 0;
        foreach ($x20 as $x21) {
            $x47 .= $this->x0b($x21, ($x14 + 1), ($x48 == $x22 - 1), ($x48 == 0), FALSE, $x18, $x19, $x1a, $x27);
            $x48++;
        }
        if (!empty($x47) || $x2c) {
            $x1c .= '<span class="opener"></span>';
            if (!empty($x3a)) {
                $x1c .= '<div class="' . implode(' ', $x3a) . '"' . $x3c . '><div class="nav-panel-inner">';
            }
            $x1c .= $x2a;
            if (!empty($x47)) {
                $x1c .= '<ul class="' . $x2d . ' ' . implode(' ', $x3b) . '"' . $x3d . '>';
                $x1c .= $x47;
                $x1c .= '</ul>';
            }
            $x1c .= $x2b;
            if (!empty($x3a)) {
                $x1c .= "\x3c/di\x76\076<\x2f\x64\x69\166>";
            }
        }
        if (FALSE === $this->p0c && $x1b["d\x64Typ\x65"] === self::DDTYPE_MEGA) {
            if (!empty($x29[3])) {
                $x1c .= '<div class="nav-block nav-block--bottom std">' . $x29[3] . '</div>';
            }
        }
        $x1c .= "\x3c\057\154i>";
        return $x1c;
    }

    public function renderCategoriesMenuHtml($x49 = FALSE, $x14 = 0, $x18 = '', $x19 = '')
    {
        $x4a = array();
        foreach ($this->getStoreCategories() as $x21) {
            if ($x21->getIsActive()) {
                $x4a[] = $x21;
            }
        }
        $x4b = count($x4a);
        $x4c = ($x4b > 0);
        if (!$x4c) {
            return '';
        }
        $x1b = array("d\144T\171\x70\145" => self::DDTYPE_NONE);
        $x1c = '';
        $x48 = 0;
        foreach ($x4a as $x13) {
            $x1c .= $this->x0b($x13, $x14, ($x48 == $x4b - 1), ($x48 == 0), TRUE, $x18, $x19, TRUE, $x1b);
            $x48++;
        }
        return $x1c;
    }

    public function renderMe($x49, $x4d = 0, $x4e = 0)
    {
        $x4f = '';
        $x50 = '';
        if ($x4d === 'parent_no_siblings') {
            if ($x51 = Mage::registry('current_category')) {
                $x4f = $x51->getId();
                $x50 = $x51->getLevel();
            }
        }
        $this->p0c = TRUE;
        $this->p0e = Mage::helper('ultramegamenu')->getCfg('sidemenu/num_of_products');
        $x14 = 0;
        $x18 = '';
        $x19 = '';
        $x52 = $this->x0e($x4d);
        $x53 = $this->x0c($x52, $x4e);
        $x4a = array();
        foreach ($x53 as $x21) {
            if ($x21->getIsActive()) {
                if ($x4d === 'parent_no_siblings') {
                    if ($x50 !== '' && $x21->getLevel() == $x50 && $x21->getId() != $x4f) {
                        continue;
                    }
                }
                $x4a[] = $x21;
            }
        }
        $x4b = count($x4a);
        $x4c = ($x4b > 0);
        if (!$x4c) {
            return '';
        }
        $x1b = array("\x64\x64\x54\x79pe" => self::DDTYPE_NONE);
        $x1c = '';
        $x48 = 0;
        foreach ($x4a as $x13) {
            $x1c .= $this->x0b($x13, $x14, ($x48 == $x4b - 1), ($x48 == 0), TRUE, $x18, $x19, TRUE, $x1b);
            $x48++;
        }
        return $x1c;
    }

    protected function x0c($x52 = 0, $x4e = 0, $x54 = FALSE, $x55 = FALSE, $x56 = TRUE)
    {
        $x13 = Mage::getModel('catalog/category');
        if ($x52 === NULL || !$x13->checkId($x52)) {
            return array();
        }
        if (Mage::helper('catalog/category_flat')->isEnabled()) {
            $x53 = $this->x0d($x52, $x4e, $x54, $x55, $x56);
        } else {
            $x53 = $x13->getCategories($x52, $x4e, $x54, $x55, $x56);
        }
        return $x53;
    }

    protected function x0d($x52 = 0, $x4e = 0, $x54 = FALSE, $x55 = FALSE, $x56 = TRUE)
    {
        $x57 = Mage::getResourceModel('catalog/category_flat');
        return $x57->getCategories($x52, $x4e, $x54, $x55, $x56);
    }

    protected function x0e($x4d)
    {
        $x52 = NULL;
        if ($x4d === 'current') {
            $x51 = Mage::registry('current_category');
            if ($x51) {
                $x52 = $x51->getId();
            }
        } elseif ($x4d === 'parent') {
            $x51 = Mage::registry('current_category');
            if ($x51) {
                $x52 = $x51->getParentId();
            }
        } elseif ($x4d === 'parent_no_siblings') {
            $x51 = Mage::registry('current_category');
            if ($x51) {
                $x52 = $x51->getParentId();
            }
        } elseif ($x4d === 'root' || !$x4d) {
            $x52 = Mage::app()->getStore()->getRootCategoryId();
        } elseif (is_numeric($x4d)) {
            $x52 = intval($x4d);
        }
        $x58 = Mage::helper('ultramegamenu')->getCfg('sidemenu/fallback');
        if ($x52 === NULL && $x58) {
            $x52 = Mage::app()->getStore()->getRootCategoryId();
        }
        return $x52;
    }

    protected function x0f($x13)
    {
        return Mage::getModel('catalog/layer')->setCurrentCategory($x13->getID())->getProductCollection()->getSize();
    }

    public function renderBlockTitle()
    {
        $x24 = Mage::helper('ultramegamenu');
        $x51 = Mage::registry('current_category');
        if (!$x51) {
            $x58 = $x24->getCfg('sidemenu/fallback');
            if ($x58) {
                $x59 = $x24->getCfg('sidemenu/block_name_fallback');
                if ($x59) {
                    return $x59;
                }
            }
        }
        $x5a = $this->getBlockName();
        if ($x5a === NULL) {
            $x5a = $x24->getCfg('sidemenu/block_name');
        }
        $x5b = '';
        if ($x51) {
            $x5b = $x51->getName();
        }
        $x5a = str_replace('[current_category]', $x5b, $x5a);
        return $x5a;
    }

    protected function x10($x25, $x5c)
    {
        if (!$this->p0f) {
            $this->p0f = Mage::helper('cms')->getBlockTemplateProcessor();
        }
        return $this->p0f->filter(trim($x25->getData($x5c)));
    }

    protected function x11($x25, $x14)
    {
        $x5d = $x25->getData('umm_cat_label');
        if ($x5d) {
            $x5e = trim(Mage::helper('ultramegamenu')->getCfg('category_labels/' . $x5d));
            if ($x5e) {
                if ($x14 == 0) {
                    return '<span class="cat-label cat-label-' . $x5d . ' pin-bottom">' . $x5e . '</span>';
                } else {
                    return '<span class="cat-label cat-label-' . $x5d . '">' . $x5e . '</span>';
                }
            }
        }
        return '';
    }
}