CREATE OR REPLACE PROCEDURE MESMGR.P_WEB_TKGTHRWHEEL (
    V_P_WORK_TYPE    IN VARCHAR2 DEFAULT 'Q',
    V_P_ID           IN VARCHAR2 DEFAULT NULL,
    V_P_IS_LOSER     IN NUMBER   DEFAULT 0,
    V_P_IP_ADDRESS   IN VARCHAR2 DEFAULT NULL,
    CV_1             OUT SYS_REFCURSOR
) AS
BEGIN
    -- 1. Handle the 'SPINNING' Logic
    IF V_P_WORK_TYPE = 'SPINNING' THEN
        MERGE INTO TKG_THR_WHEEL T
        USING (
            SELECT 
                V_P_ID         AS ID,
                V_P_IS_LOSER   AS ISLOSER,
                V_P_IP_ADDRESS AS IP_ADDR
            FROM DUAL
        ) S
        ON (T.ID = S.ID AND T.IP_ADDR = S.IP_ADDR)
        WHEN NOT MATCHED THEN
            INSERT (
                ID,
                ISLOSER,
                IP_ADDR,
                CREATION_DATE,
                UPDATE_DATE
            )
            VALUES (
                S.ID,
                S.ISLOSER,
                S.IP_ADDR,
                SYSDATE,
                SYSDATE
            )
        WHEN MATCHED THEN
            UPDATE SET 
                T.ISLOSER = S.ISLOSER,
                T.UPDATE_DATE = SYSDATE;

    -- GET USER ID
    ELSIF V_P_WORK_TYPE = 'Q' THEN
        OPEN CV_1 FOR
            SELECT * FROM TKG_THR_WHEEL
            WHERE (V_P_ID IS NULL OR ID = V_P_ID);

    -- 3. Exception Handling
    ELSE
        RAISE_APPLICATION_ERROR(-20000, 'Invalid WORK_TYPE: ' || V_P_WORK_TYPE);
    END IF;

END P_WEB_TKGTHRWHEEL;
/