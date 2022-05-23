CREATE TABLE [dbo].[offers_products] (
    [product_id] BIGINT NOT NULL,
    [offer_id]   BIGINT NOT NULL,
    FOREIGN KEY ([offer_id]) REFERENCES [dbo].[offers] ([Id]),
    FOREIGN KEY ([product_id]) REFERENCES [dbo].[products] ([Id])
);


GO

CREATE TABLE [dbo].[coupons] (
    [Id]                    BIGINT         NOT NULL,
    [code]                  INT            NOT NULL,
    [discount]              DECIMAL (1)    NOT NULL,
    [discount_type]         CHAR (10)      NOT NULL,
    [min_order_price]       DECIMAL (3, 2) NOT NULL,
    [max_discount_value]    DECIMAL (4, 2) NOT NULL,
    [max_usage_num]         TINYINT        NOT NULL,
    [max_usage_num-peruser] TINYINT        NOT NULL,
    [start_datetime]        DATETIME       NOT NULL,
    [end_datetime]          DATETIME       NOT NULL,
    [created_at]            ROWVERSION     NOT NULL,
    [updated_at]            DATETIME       NULL,
    [status]                TINYINT        NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC),
    UNIQUE NONCLUSTERED ([code] ASC)
);


GO

CREATE TABLE [dbo].[subcategories] (
    [id]          BIGINT       NOT NULL,
    [name_ar]     VARCHAR (32) NOT NULL,
    [name_en]     VARCHAR (32) NOT NULL,
    [image]       VARCHAR (64) DEFAULT ('default.png') NOT NULL,
    [created_at]  DATETIME     DEFAULT (getdate()) NULL,
    [updated_at]  DATETIME     DEFAULT (NULL) NULL,
    [category_id] BIGINT       NOT NULL,
    [status]      TINYINT      DEFAULT ((1)) NULL,
    PRIMARY KEY CLUSTERED ([id] ASC),
    FOREIGN KEY ([category_id]) REFERENCES [dbo].[categories] ([id])
);


GO

CREATE TABLE [dbo].[products_specs] (
    [product_id] BIGINT  NOT NULL,
    [spec_id]    BIGINT  NOT NULL,
    [value]      TINYINT NOT NULL,
    FOREIGN KEY ([product_id]) REFERENCES [dbo].[products] ([Id]),
    FOREIGN KEY ([spec_id]) REFERENCES [dbo].[specs] ([Id])
);


GO

CREATE TABLE [dbo].[offers] (
    [Id]             BIGINT       NOT NULL,
    [title_ar]       VARCHAR (20) NOT NULL,
    [title_en]       VARCHAR (20) NOT NULL,
    [image]          VARCHAR (1)  DEFAULT ('default.png') NOT NULL,
    [discount]       DECIMAL (1)  NOT NULL,
    [discount_type]  CHAR (10)    NOT NULL,
    [start_datetime] DATETIME     NOT NULL,
    [end_datetime]   DATETIME     NOT NULL,
    [created_at]     ROWVERSION   NOT NULL,
    [updated_at]     DATETIME     NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC)
);


GO

CREATE TABLE [dbo].[categories] (
    [id]         BIGINT       NOT NULL,
    [name_ar]    VARCHAR (32) NOT NULL,
    [name_en]    VARCHAR (32) NOT NULL,
    [image]      VARCHAR (64) DEFAULT ('default.png') NOT NULL,
    [stat]       TINYINT      DEFAULT ((1)) NULL,
    [created_at] DATETIME     DEFAULT (getdate()) NULL,
    [updated_at] DATETIME     DEFAULT (NULL) NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO

CREATE TABLE [dbo].[region] (
    [Id]         BIGINT       NOT NULL,
    [name_ar]    VARCHAR (20) NOT NULL,
    [name_en]    VARCHAR (20) NOT NULL,
    [distance]   BIGINT       NOT NULL,
    [attribute]  VARCHAR (50) DEFAULT (NULL) NULL,
    [lat]        DECIMAL (18) NOT NULL,
    [long]       DECIMAL (18) NOT NULL,
    [created_at] ROWVERSION   NOT NULL,
    [city_id]    BIGINT       NOT NULL,
    [status]     TINYINT      NOT NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC),
    FOREIGN KEY ([city_id]) REFERENCES [dbo].[cities] ([Id])
);


GO

CREATE TABLE [dbo].[admins] (
    [id]                BIGINT        NOT NULL,
    [name]              VARCHAR (32)  NOT NULL,
    [email]             VARCHAR (32)  NOT NULL,
    [password]          VARCHAR (255) NOT NULL,
    [phone]             VARCHAR (11)  NOT NULL,
    [email_verified_at] ROWVERSION    NULL,
    [phone_verified_at] DATETIME      NULL,
    [status]            VARCHAR (1)   NULL,
    [created_at]        DATETIME      NOT NULL,
    [updated_at]        DATETIME      NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO

CREATE TABLE [dbo].[products] (
    [Id]             BIGINT         NOT NULL,
    [name_ar]        VARCHAR (512)  NOT NULL,
    [name_en]        VARCHAR (512)  NOT NULL,
    [details_ar]     TEXT           NOT NULL,
    [details_en]     TEXT           NOT NULL,
    [price]          DECIMAL (7, 2) NOT NULL,
    [quantity]       TINYINT        DEFAULT ('1') NULL,
    [image]          VARCHAR (64)   NOT NULL,
    [subcategory_id] BIGINT         NOT NULL,
    [brand_id]       BIGINT         NOT NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC),
    FOREIGN KEY ([brand_id]) REFERENCES [dbo].[brands] ([id]),
    FOREIGN KEY ([subcategory_id]) REFERENCES [dbo].[subcategories] ([id])
);


GO

CREATE TABLE [dbo].[adresses] (
    [Id]         BIGINT       NOT NULL,
    [street]     VARCHAR (20) NOT NULL,
    [building]   TINYINT      NOT NULL,
    [floor]      TINYINT      NOT NULL,
    [flat]       TINYINT      NOT NULL,
    [notes]      TEXT         DEFAULT (NULL) NULL,
    [created_at] ROWVERSION   NOT NULL,
    [user_id]    BIGINT       NOT NULL,
    [updated_at] DATETIME     NULL,
    [city_id]    BIGINT       NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC),
    FOREIGN KEY ([city_id]) REFERENCES [dbo].[cities] ([Id]),
    FOREIGN KEY ([user_id]) REFERENCES [dbo].[users] ([id])
);


GO

CREATE TABLE [dbo].[favs] (
    [user_id]    BIGINT NOT NULL,
    [product_id] BIGINT NOT NULL,
    FOREIGN KEY ([product_id]) REFERENCES [dbo].[products] ([Id]),
    FOREIGN KEY ([user_id]) REFERENCES [dbo].[users] ([id])
);


GO

CREATE TABLE [dbo].[orders_products] (
    [product_id] BIGINT       NOT NULL,
    [order_id]   BIGINT       NOT NULL,
    [price]      DECIMAL (18) NOT NULL,
    [quantity]   TINYINT      NOT NULL,
    FOREIGN KEY ([order_id]) REFERENCES [dbo].[orders] ([Id]),
    FOREIGN KEY ([product_id]) REFERENCES [dbo].[products] ([Id])
);


GO

CREATE TABLE [dbo].[reviews] (
    [rate]       INT        NULL,
    [comment]    TEXT       DEFAULT (NULL) NULL,
    [created_at] ROWVERSION NOT NULL,
    [updated_at] DATETIME   NULL,
    [id]         BIGINT     NOT NULL,
    [user_id]    BIGINT     NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC),
    FOREIGN KEY ([user_id]) REFERENCES [dbo].[users] ([id])
);


GO

CREATE TABLE [dbo].[users] (
    [id]                BIGINT        NOT NULL,
    [email]             VARCHAR (32)  NOT NULL,
    [phone]             VARCHAR (11)  NOT NULL,
    [password]          VARCHAR (255) NOT NULL,
    [code]              INT           DEFAULT (NULL) NULL,
    [gender]            CHAR (1)      NOT NULL,
    [image]             VARCHAR (64)  NOT NULL,
    [email_verified_at] ROWVERSION    NULL,
    [phone_verified_at] DATETIME      DEFAULT (NULL) NULL,
    [created_at]        DATETIME      DEFAULT (getdate()) NULL,
    [updated_at]        DATETIME      DEFAULT (NULL) NULL,
    [status]            TINYINT       DEFAULT ((1)) NULL,
    [name]              VARCHAR (32)  NOT NULL,
    PRIMARY KEY CLUSTERED ([id] ASC),
    UNIQUE NONCLUSTERED ([email] ASC),
    UNIQUE NONCLUSTERED ([phone] ASC)
);


GO

CREATE TABLE [dbo].[replies-complains] (
    [Id]         BIGINT       NOT NULL,
    [message]    VARCHAR (20) NOT NULL,
    [created_at] ROWVERSION   NOT NULL,
    [user_id]    BIGINT       NOT NULL,
    [updated_at] DATETIME     NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC),
    FOREIGN KEY ([user_id]) REFERENCES [dbo].[users] ([id])
);


GO

CREATE TABLE [dbo].[brands] (
    [id]         BIGINT       NOT NULL,
    [name_ar]    VARCHAR (32) NOT NULL,
    [name_en]    VARCHAR (32) NOT NULL,
    [created_at] DATETIME     DEFAULT (getdate()) NULL,
    [updated_at] DATETIME     DEFAULT (NULL) NULL,
    [image]      VARCHAR (64) DEFAULT ('default.png') NULL,
    PRIMARY KEY CLUSTERED ([id] ASC)
);


GO

CREATE TABLE [dbo].[carts] (
    [user_id]    BIGINT NOT NULL,
    [product_id] BIGINT NOT NULL,
    [quantity]   INT    NULL,
    FOREIGN KEY ([product_id]) REFERENCES [dbo].[products] ([Id]),
    FOREIGN KEY ([user_id]) REFERENCES [dbo].[users] ([id])
);


GO

CREATE TABLE [dbo].[specs] (
    [Id]   BIGINT       NOT NULL,
    [name] VARCHAR (20) NOT NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC)
);


GO

CREATE TABLE [dbo].[cities] (
    [Id]         BIGINT       NOT NULL,
    [name_ar]    VARCHAR (20) NOT NULL,
    [name_en]    VARCHAR (20) NOT NULL,
    [distance]   BIGINT       NOT NULL,
    [lat]        DECIMAL (18) NOT NULL,
    [long]       DECIMAL (18) NOT NULL,
    [created_at] ROWVERSION   NOT NULL,
    [updated_at] DATETIME     NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC)
);


GO

CREATE TABLE [dbo].[orders] (
    [Id]             BIGINT         NOT NULL,
    [order_num]      INT            NOT NULL,
    [total_price]    DECIMAL (3, 2) NOT NULL,
    [quantity]       TINYINT        DEFAULT ((1)) NOT NULL,
    [delivered_at]   ROWVERSION     NOT NULL,
    [payment_method] CHAR (10)      NOT NULL,
    [address_id]     BIGINT         NOT NULL,
    [coupon_id]      BIGINT         NOT NULL,
    PRIMARY KEY CLUSTERED ([Id] ASC),
    FOREIGN KEY ([address_id]) REFERENCES [dbo].[adresses] ([Id]),
    FOREIGN KEY ([coupon_id]) REFERENCES [dbo].[coupons] ([Id])
);


GO

